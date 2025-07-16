@props(["id" => $id, "name" => $name, "title" => $title, "validFiles" => $validFiles, "accept" => $accept, "multiple" => false])

<div class="flex w-full text-center flex-col gap-1">
    <span class="w-fit pl-0.5 text-sm text-on-surface dark:text-on-surface-dark">{{ $title }}</span>
    <div class="flex w-full flex-col items-center justify-center gap-2 rounded-radius border border-dashed border-outline p-8 text-on-surface dark:border-outline-dark dark:text-on-surface-dark mb-3">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" aria-hidden="true" fill="currentColor" class="w-12 h-12 opacity-75">
            <path fill-rule="evenodd" d="M10.5 3.75a6 6 0 0 0-5.98 6.496A5.25 5.25 0 0 0 6.75 20.25H18a4.5 4.5 0 0 0 2.206-8.423 3.75 3.75 0 0 0-4.133-4.303A6.001 6.001 0 0 0 10.5 3.75Zm2.03 5.47a.75.75 0 0 0-1.06 0l-3 3a.75.75 0 1 0 1.06 1.06l1.72-1.72v4.94a.75.75 0 0 0 1.5 0v-4.94l1.72 1.72a.75.75 0 1 0 1.06-1.06l-3-3Z" clip-rule="evenodd"/>
        </svg>
        <div class="group">
            <label for="{{ $id }}" class="font-medium text-primary group-focus-within:underline dark:text-primary-dark">
                <input id="{{ $id }}" name="{{ $name }}" type="file" accept="{{ $accept }}" class="sr-only" {{ $multiple ? "multiple" : "" }}/>
                Browse
            </label>
             or drag and drop here
        </div>
        <small>{{ implode(", ", explode(",", $validFiles)) }}</small>
        @error($name)
            <small class="pl-0.5 text-danger">{{ $message }}</small>
        @enderror()
    </div>
    <span id="{{ $id }}ViewerJSLabel" class="hidden text-sm text-start text-on-surface dark:text-on-surface-dark mb-2">Preview</span>
    <div id="{{ $id }}ViewerJS" class="hidden flex flex-wrap justify-center md:justify-start gap-2"></div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", () => {
        $(() => {
            const $input = $("#{{ $id }}");

            $input.on("input", (e) => {
                const files = e.currentTarget.files;
                const $imagePreviewer = $("#{{ $id }}ViewerJS");
                const $imagePreviewerLabel = $("#{{ $id }}ViewerJSLabel");

                $imagePreviewerLabel.removeClass("hidden");
                $imagePreviewer.removeClass("hidden");
                $imagePreviewer.empty();

                if (!files.length) {
                    $imagePreviewerLabel.addClass("hidden");
                    $imagePreviewer.addClass("hidden");
                    return;
                }

                for (const file of files) {
                    const url = URL.createObjectURL(file);
                    const $image = $("<img>", {
                        src: url,
                        alt: url
                    }).addClass(["size-[150px]", "cursor-pointer", "rounded-md", "object-cover"]).appendTo($imagePreviewer);

                    new Viewer($image.get(0));
                }
            });
        });
    });
</script>