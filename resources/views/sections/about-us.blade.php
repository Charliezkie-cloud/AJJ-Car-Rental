<section class="py-6 bg-surface dark:bg-surface-dark">

    @if (Session::has("createBookSuccess"))
        <div x-init="$dispatch('notify', {
            variant: 'success',
            title: 'Form submitted!',
            message: '{{ Session("createBookSuccess") }}'
        })"></div>
    @endif

    <h2 class="text-2xl md:text-3xl text-on-surface dark:text-on-surface-dark uppercase tracking-wide font-bold text-center mb-4">About us</h2>
    <div class="max-w-7xl mx-6 sm:mx-8 md:mx-10 lg:mx-12 xl:mx-auto">
        <div class="mb-5">
            <p class="text-on-surface dark:text-on-surface mb-3 text-center"><span class="font-semibold">AJJ Car Rental</span> <span class="italic">(formerly AJERRO)</span> is a car rental service that has been providing reliable and affordable transportation solutions since 2017. We understand the importance of convenience, flexibility, and affordability when it comes to renting a car. Our commitment is to make your car rental experience hassle-free and enjoyable.</p>
            <p class="text-on-surface dark:text-on-surface mb-3 text-center">Whether you need a vehicle for business travel, family vacations, or simply getting around town, we have the perfect solution for you. With AJJ Car Rental, you can expect a comfortable and smooth ride, no matter where your journey takes you.</p>
            <p class="text-on-surface dark:text-on-surface text-center">AJJ Car Rental is located at Garden Bloom South Subdivision, Upper Pakigne Road, Minglanilla, Cebu. You may refer to this link from Google Maps if you want to visit us: <a href="https://goo.gl/maps/QQaQX8wb4QZ3zZ7y7" class="text-blue-500 hover:text-blue-300">https://goo.gl/maps/QQaQX8wb4QZ3zZ7y7</a></p>
        </div>
        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15704.291261641274!2d123.7937473!3d10.2557112!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x33a99db1bcf3f317%3A0x8bf5fea163adff9!2sAJJ%20Car%20%26%20Motorbike%20Rental%20-%20Cebu!5e0!3m2!1sen!2sph!4v1752676247812!5m2!1sen!2sph" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" class="rounded-lg h-[250px] sm:h-[450px] w-full mb-5"></iframe>
        <p class="text-on-surface dark:text-on-surface text-center">Contact us through our Facebook page, AJJ Car Rental - Cebu or text/call at 09109010906 / 09155353767. You may also send us an email at ajjcarrental@gmail.com</p>
    </div>
</section>
