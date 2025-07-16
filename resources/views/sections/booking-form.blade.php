<section class="py-6 bg-surface dark:bg-surface-dark">

    @if (Session::has("createBookSuccess"))
        <div x-init="$dispatch('notify', {
            variant: 'success',
            title: 'Form submitted!',
            message: '{{ Session("createBookSuccess") }}'
        })"></div>
    @endif

    <h2 class="text-2xl md:text-3xl text-on-surface dark:text-on-surface-dark uppercase tracking-wide font-bold text-center mb-4">Booking Form</h2>
    <div class="max-w-7xl mx-6 sm:mx-8 md:mx-10 lg:mx-12 xl:mx-auto bg-surface-alt dark:bg-surface-dark-alt rounded-md p-4 sm:p-6 mb-4">
        <h3 class="text-xl md:text-2xl text-on-surface dark:text-on-surface-dark mb-4">Before filling out the booking form, please read the following:</h3>
        <ol class="list-decimal p-4 ps-6">
            <li class="mb-4 text-on-surface dark:text-on-surface-dark">Make sure all the details are correct. Information provided in this booking form will be sent to AJJ Car Rental upon submission. They will contact the renter as soon as they receive the renter’s information and rental details to confirm the booking.</li>
            <li class="mb-4 text-on-surface dark:text-on-surface-dark">Before confirmation of booking, renter should pay a reservation fee of ₱500. This will be part of the rental fee.</li>
            <li class="mb-4 text-on-surface dark:text-on-surface-dark">
                Renter should prepare the following requirements:
                <ul class="list-disc ps-4 sm:ps-6 mt-4">
                    <li class="mb-4 text-on-surface dark:text-on-surface-dark">Driver’s License (photo will be taken only)</li>
                    <li class="mb-4 text-on-surface dark:text-on-surface-dark">Deposit 2 valid IDs (government-issued)</li>
                    <li class="mb-4 text-on-surface dark:text-on-surface-dark">Cash Bond of ₱2,000 (refundable upon return of vehicle)</li>
                    <li class="text-on-surface dark:text-on-surface-dark">Full Rental Fee (+delivery fee if applicable, minimum of ₱300)</li>
                </ul>
            </li>
            <li class="mb-4 text-on-surface dark:text-on-surface-dark">Rental agreement shall be provided upon release of vehicle where renter should affix his/her signature. This will list all the rules that should be followed by the renter while the vehicle is rented.</li>
            <li class="text-on-surface dark:text-on-surface-dark">The vehicle will not be released if the listed requirements are not provided.</li>
        </ol>
    </div>

    <div class="max-w-7xl mx-6 sm:mx-8 md:mx-10 lg:mx-12 xl:mx-auto bg-surface-alt dark:bg-surface-dark-alt rounded-md p-4 sm:p-6">
        <form action="/create-book" method="POST">
            @csrf
            <div class="flex flex-col sm:flex-row gap-4">
                <div class="w-full">
                    <h3 class="text-xl md:text-2xl text-on-surface dark:text-on-surface-dark mb-4">Renter's Information</h3>
                    <div class="mb-3">
                        <x-penguin_text_input id="nameInput" name="name" title="Full name" />
                    </div>
                    <div class="mb-3">
                        <x-penguin_text_input id="emailInput" name="email" title="Email" />
                    </div>
                    <div class="mb-3">
                        <x-penguin_text_input id="contactNumberInput" name="contact_number" title="Contact number" />
                    </div>
                    <div class="mb-3">
                        <x-penguin_text_input id="addressInput" name="address" title="Address" />
                    </div>
                    <div class="mb-3">
                        <x-penguin_textarea id="messageInput" name="message" title="Message" />
                    </div>
                </div>
                <div class="w-full mb-3">
                    <h3 class="text-xl md:text-2xl text-on-surface dark:text-on-surface-dark mb-4">Rental Details</h3>

                    <div class="mb-3">
                        <span class="text-sm text-on-surface dark:text-on-surface-dark">Rental options</span>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mt-1">
                            <label class="relative flex items-center gap-4 rounded-radius bg-surface-alt p-2 hover:scale-105 transition-transform text-on-surface dark:text-on-surface-dark dark:bg-surface-dark-alt has-checked:border-primary has-checked:bg-primary/5 has-checked:text-on-surface-strong has-checked:border has-focus:outline-2 has-focus:outline-offset-2 has-focus:outline-primary dark:has-checked:border-primary-dark dark:has-checked:text-on-surface-dark-strong dark:has-checked:bg-primary-dark/5 dark:has-focus:outline-primary-dark border border-outline dark:border-outline-dark">
                                <input type="radio" id="daily" class="sr-only peer" name="rental_option" value="daily" checked >
                                <x-heroicon-c-check class="peer-checked:visible invisible w-5 h-5 shrink-0"/>
                                <div class="flex flex-col">
                                    <h3 class="font-medium">Daily</h3>
                                </div>
                            </label>
                             <label class="relative flex items-center gap-4 rounded-radius bg-surface-alt p-2 hover:scale-105 transition-transform text-on-surface dark:text-on-surface-dark dark:bg-surface-dark-alt has-checked:border-primary has-checked:bg-primary/5 has-checked:text-on-surface-strong has-checked:border has-focus:outline-2 has-focus:outline-offset-2 has-focus:outline-primary dark:has-checked:border-primary-dark dark:has-checked:text-on-surface-dark-strong dark:has-checked:bg-primary-dark/5 dark:has-focus:outline-primary-dark border border-outline dark:border-outline-dark">
                                <input type="radio" id="weekly" class="sr-only peer" name="rental_option" value="weekly" >
                                <x-heroicon-c-check class="peer-checked:visible invisible w-5 h-5 shrink-0"/>
                                <div class="flex flex-col">
                                    <h3 class="font-medium">Weekly</h3>
                                </div>
                            </label>
                             <label class="relative flex items-center gap-4 rounded-radius bg-surface-alt p-2 hover:scale-105 transition-transform text-on-surface dark:text-on-surface-dark dark:bg-surface-dark-alt has-checked:border-primary has-checked:bg-primary/5 has-checked:text-on-surface-strong has-checked:border has-focus:outline-2 has-focus:outline-offset-2 has-focus:outline-primary dark:has-checked:border-primary-dark dark:has-checked:text-on-surface-dark-strong dark:has-checked:bg-primary-dark/5 dark:has-focus:outline-primary-dark border border-outline dark:border-outline-dark">
                                <input type="radio" id="monthly" class="sr-only peer" name="rental_option" value="monthly" >
                                <x-heroicon-c-check class="peer-checked:visible invisible w-5 h-5 shrink-0"/>
                                <div class="flex flex-col">
                                    <h3 class="font-medium">Monthly</h3>
                                </div>
                            </label>
                        </div>
                    </div>

                    <div class="relative flex w-full flex-col gap-1 text-on-surface dark:text-on-surface-dark mb-3">
                        <label for="vehicleSelectInput" class="flex w-fit items-center gap-1 pl-0.5 text-sm @error("vehicle") text-danger @enderror">
                             @error("vehicle")
                                <x-heroicon-c-x-mark class="size-4 text-danger" />
                            @enderror
                            Vehicle
                        </label>
                        <select id="vehicleSelectInput" name="vehicle" class="w-full appearance-none rounded-radius border border-outline bg-surface-alt px-4 py-2 text-sm focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary disabled:cursor-not-allowed disabled:opacity-75 dark:border-outline-dark dark:bg-surface-dark-alt/50 dark:focus-visible:outline-primary-dark">
                            <option selected disabled>Select a vehicle</option>
                            @foreach ($cars as $car)
                                <option value="{{ $car->id }}">{{ $car->model }}</option>
                            @endforeach
                        </select>
                        @error("vehicle")
                            <small class="pl-0.5 text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="flex w-full flex-col gap-1 text-on-surface dark:text-on-surface-dark mb-3">
                        <label for="startDateTimeInput" class="flex w-fit items-center gap-1 pl-0.5 text-sm @error("start_date_time") text-danger @enderror">
                            @error("start_date_time")
                                <x-heroicon-c-x-mark class="size-4 text-danger" />
                            @enderror
                            Rental start Date and Time
                        </label>
                        <input id="startDateTimeInput" type="datetime-local" class="w-full rounded-radius border border-outline bg-surface-alt px-2 py-2 text-sm focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary disabled:cursor-not-allowed disabled:opacity-75 dark:border-outline-dark dark:bg-surface-dark-alt/50 dark:focus-visible:outline-primary-dark" name="start_date_time" autocomplete="name"/>
                        @error("start_date_time")
                            <small class="pl-0.5 text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="flex w-full flex-col gap-1 text-on-surface dark:text-on-surface-dark mb-3">
                        <label for="endDateTimeInput" class="flex w-fit items-center gap-1 pl-0.5 text-sm @error("end_date_time") text-danger @enderror">
                            @error("end_date_time")
                                <x-heroicon-c-x-mark class="size-4 text-danger" />
                            @enderror
                            Rental end Date and Time
                        </label>
                        <input id="endDateTimeInput" type="datetime-local" class="w-full rounded-radius border border-outline bg-surface-alt px-2 py-2 text-sm focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary disabled:cursor-not-allowed disabled:opacity-75 dark:border-outline-dark dark:bg-surface-dark-alt/50 dark:focus-visible:outline-primary-dark" name="end_date_time" autocomplete="name"/>
                        @error("end_date_time")
                            <small class="pl-0.5 text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="relative flex w-full flex-col gap-1 text-on-surface dark:text-on-surface-dark mb-3">
                        <label for="deliverySelectInput" class="flex w-fit items-center gap-1 pl-0.5 text-sm @error("delivery") text-danger @enderror">
                             @error("delivery")
                                <x-heroicon-c-x-mark class="size-4 text-danger" />
                            @enderror
                            Mode of Delivery
                        </label>
                        <select id="deliverySelectInput" name="delivery" class="w-full appearance-none rounded-radius border border-outline bg-surface-alt px-4 py-2 text-sm focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary disabled:cursor-not-allowed disabled:opacity-75 dark:border-outline-dark dark:bg-surface-dark-alt/50 dark:focus-visible:outline-primary-dark">
                            <option selected disabled>Select a mode of delivery</option>
                            @foreach ($deliveries as $delivery)
                                @if ($delivery->price < 1)
                                    <option value="{{ $delivery->id }}">{{ $delivery->name }} | Free</option>
                                @else
                                    <option value="{{ $delivery->id }}">{{ $delivery->name }} | &#8369;{{ number_format($delivery->price, 2, ".", ",") }}</option>
                                @endif
                            @endforeach
                        </select>
                        @error("delivery")
                            <small class="pl-0.5 text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <span class="text-sm text-on-surface dark:text-on-surface-dark">Total: <span id="total">&#8369;0</span></span>
                        <input id="totalInput" type="hidden" name="total">
                    </div>
                </div>
            </div>
            <div class="flex w-full justify-end">
                <button type="submit" class="whitespace-nowrap rounded-radius bg-primary border border-primary px-4 py-2 text-sm font-medium tracking-wide text-on-primary transition hover:opacity-75 text-center focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary active:opacity-100 active:outline-offset-0 disabled:opacity-75 disabled:cursor-not-allowed dark:bg-primary-dark dark:border-primary-dark dark:text-on-primary-dark dark:focus-visible:outline-primary-dark">Book</button>
            </div>
        </form>
    </div>
</section>

<script>
    document.addEventListener("DOMContentLoaded", () => {
        $(() => {
            const now = new Date();
            const tzOffset = now.getTimezoneOffset() * 60000;
            const localISO = new Date(now - tzOffset).toISOString().slice(0, 16);
            const $startDateTimeInput = $("#startDateTimeInput");
            const $endDateTimeInput = $("#endDateTimeInput");
            $startDateTimeInput.attr("min", localISO);
            $endDateTimeInput.attr("min", localISO);

            const rentalOptionChooser = () => {
                const rentalOptionInput = $("[name='rental_option']");
                const start = new Date($startDateTimeInput.val());
                const end = new Date($endDateTimeInput.val());
                const msPerDay = 1000 * 60 * 60 * 24;
                const daysDiff = (end - start ) / msPerDay;
                const finalDiff = daysDiff + 1;
                if (finalDiff < 7) {
                    rentalOptionInput.each((index, el) => {
                        if (el.checked) {
                            el.checked = false;
                        }
                        if (el.value === "daily") {
                            return el.checked = true;
                        }
                    });
                }
                if (finalDiff >= 7) {
                    rentalOptionInput.each((index, el) => {
                        if (el.checked) {
                            el.checked = false;
                        }
                        if (el.value === "weekly") {
                            return el.checked = true;
                        }
                    });
                }
                if (finalDiff >= 30) {
                    rentalOptionInput.each((index, el) => {
                        if (el.checked) {
                            el.checked = false;
                        }
                        if (el.value === "monthly") {
                            return el.checked = true;
                        }
                    });
                }
            }

            $startDateTimeInput.on("input", () => {
                $endDateTimeInput.attr("min", $startDateTimeInput.val());
                if (!$endDateTimeInput.val()) return;
                rentalOptionChooser();
            });
            $endDateTimeInput.on("input", () => {
                if (!$startDateTimeInput.val()) return;
                rentalOptionChooser();
            });
            const $vehicleSelectInput = $("#vehicleSelectInput");
            const $deliverySelectInput = $("#deliverySelectInput");
            const $totalLabel = $("#total");
            const $totalInput = $("#totalInput");

            let total = 0;
            let perDayPrice = 0;
            let deliveryPrice = 0;
            $vehicleSelectInput.on("input", () => {
                $.ajax({
                    url: "/vehicles-data",
                    type: "GET",
                    dataType: "json",
                    success: ((data) => {
                        for (const car of data.cars) {
                            const id = car.id;
                            if ($vehicleSelectInput.val() === id.toString()) {
                                perDayPrice = parseFloat(car.price);
                                total = perDayPrice + deliveryPrice;
                                $totalLabel.text(total.toLocaleString('en-PH', { style: 'currency', currency: 'PHP' }));
                                return $totalInput.val(total);
                            }
                        }
                    })
                });
            });

            $deliverySelectInput.on("input", () => {
                $.ajax({
                    url: "/delivery-data",
                    type: "GET",
                    dataType: "json",
                    success: ((data) => {
                        for (const delivery of data.deliveries) {
                            const id = delivery.id;
                            if ($deliverySelectInput.val() === id.toString()) {
                                deliveryPrice = parseFloat(delivery.price);
                                total = perDayPrice + deliveryPrice;
                                $totalLabel.text(total.toLocaleString('en-PH', { style: 'currency', currency: 'PHP' }));
                                return $totalInput.val(total);
                            }
                        }
                    })
                });
            });

            const params = new URLSearchParams(document.location.search);
            const selectedID = params.get("id");

            $vehicleSelectInput.val(selectedID);
            $vehicleSelectInput.trigger("input");
        });
    });
</script>
