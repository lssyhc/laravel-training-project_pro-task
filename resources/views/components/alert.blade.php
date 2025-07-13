@props(['type' => 'success', 'message'])

@if ($message)
    <div role="alert" x-data="{ show: true }" x-init="setTimeout(() => show = false, 4000)" x-show="show"
        x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 transform translate-y-2"
        x-transition:enter-end="opacity-100 transform translate-y-0" x-transition:leave="transition ease-in duration-300"
        x-transition:leave-start="opacity-100 transform translate-y-0"
        x-transition:leave-end="opacity-0 transform translate-y-2" @class([
            'p-4 rounded-md mb-6 text-sm font-medium',
            'bg-green-100 text-green-800' => $type === 'success',
            'bg-red-100 text-red-800' => $type === 'danger',
            'bg-blue-100 text-blue-800' => $type === 'info',
        ])>
        {{ $message }}
    </div>
@endif
