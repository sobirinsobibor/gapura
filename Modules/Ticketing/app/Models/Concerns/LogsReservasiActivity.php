<?php

namespace Modules\Ticketing\Models\Concerns;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Modules\Ticketing\Models\TicketingActivityLog;
use Modules\Ticketing\Models\TicketingPemesanan;

trait LogsReservasiActivity
{
    protected static function bootLogsReservasiActivity(): void
    {
        static::created(function (Model $model) {
            $model->recordActivity('created');
        });

        static::updated(function (Model $model) {
            $model->recordActivity('updated');
        });

        static::deleted(function (Model $model) {
            $model->recordActivity('deleted');
        });
    }

    protected function recordActivity(string $event): void
    {
        $userId = Auth::id();

        if (! $userId) {
            return;
        }

        $changes = $this->resolveActivityChanges($event);

        if ($event === 'updated' && empty($changes)) {
            return;
        }

        TicketingActivityLog::create([
            'user_id' => $userId,
            'tckt_pemesanan_id' => $this->resolvePemesananId(),
            'entity_type' => static::class,
            'entity_id' => $this->getKey(),
            'event' => $event,
            'changes' => $changes,
        ]);
    }

    protected function resolvePemesananId(): ?int
    {
        if ($this instanceof TicketingPemesanan) {
            return (int) $this->getKey();
        }

        return isset($this->tckt_pemesanan_id) ? (int) $this->tckt_pemesanan_id : null;
    }

    protected function resolveActivityChanges(string $event): ?array
    {
        if ($event === 'created') {
            return $this->activitySanitize($this->getAttributes());
        }

        if ($event === 'updated') {
            $changes = [];

            foreach ($this->getChanges() as $field => $newValue) {
                if ($this->activityExcludedFieldsContains($field)) {
                    continue;
                }

                $oldValue = $this->getOriginal($field);

                if ($oldValue == $newValue) {
                    continue;
                }

                $changes[$field] = [
                    'old' => $oldValue,
                    'new' => $newValue,
                ];
            }

            return $changes;
        }

        return null;
    }

    protected function activitySanitize(array $attributes): array
    {
        return array_filter(
            $attributes,
            fn ($field): bool => ! $this->activityExcludedFieldsContains($field),
            ARRAY_FILTER_USE_KEY,
        );
    }

    protected function activityExcludedFieldsContains(string $field): bool
    {
        return in_array($field, [
            'id',
            'created_at',
            'updated_at',
        ], true);
    }
}
