@props(["id" => $id, "name" => $name, "placeholder" => "", "title" => $title])

<div class="flex w-full flex-col gap-1 text-on-surface dark:text-on-surface-dark">
    <label for="{{ $id }}" class="flex w-fit items-center gap-1 pl-0.5 text-sm @error($name) text-danger @enderror">
        @error($name)
            <x-heroicon-c-x-mark class="size-4 text-danger" />
        @enderror
        {{ $title }}
    </label>
    <textarea id="{{ $id }}" class="w-full min-h-[100px] h-[150px] max-h-[250px] rounded-radius border border-outline bg-surface-alt px-2.5 py-2 text-sm focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary disabled:cursor-not-allowed disabled:opacity-75 dark:border-outline-dark dark:bg-surface-dark-alt/50 dark:focus-visible:outline-primary-dark" rows="3" placeholder="{{ $placeholder }}" name="{{ $name }}"></textarea>
     @error($name)
        <small class="pl-0.5 text-danger">{{ $message }}</small>
    @enderror
</div>
