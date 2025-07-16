@props(["id" => $id, "name" => $name, "title" => $title, "placeholder" => "", "value" => ""])

<div class="flex w-full flex-col gap-1 text-on-surface dark:text-on-surface-dark">
    <label for="{{ $id }}" class="flex w-fit items-center gap-1 pl-0.5 text-sm @error($name) text-danger @enderror">
        @error($name)
            <x-heroicon-c-x-mark class="size-4 text-danger" />
        @enderror
        {{ $title }}
    </label>
    <input id="{{ $id }}" value="{{ $value }}" type="text" class="w-full rounded-radius border border-outline bg-surface-alt px-2 py-2 text-sm focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary disabled:cursor-not-allowed disabled:opacity-75 dark:border-outline-dark dark:bg-surface-dark-alt/50 dark:focus-visible:outline-primary-dark" name="{{ $name }}" placeholder="{{ $placeholder !== "" ? $placeholder : "" }}" autocomplete="name"/>
    @error($name)
        <small class="pl-0.5 text-danger">{{ $message }}</small>
    @enderror
</div>