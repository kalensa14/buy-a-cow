<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                <div class="p-6 bg-white border-b border-gray-200" x-data="{ purchased: @json($purchased), thankYou: false }">
                    <x-button
                        x-data="{
                                loading: false,
                                buyIt() {
                                    this.loading = true;
                                    this.submitPurchase();
                                },
                                async submitPurchase() {
                                    const self = this;
                                    await(fetch('{{ route('purchase.store') }}', {
                                          method: 'POST',
                                          headers: new Headers({'X-CSRF-TOKEN': '{{ csrf_token() }}'})
                                        })
                                      .then(response => {
                                        if (response.status === 204) {
                                          thankYou = true;
                                        } else if (response.status === 406) {

                                        } else {

                                        }

                                        self.loading = false;
                                      }))
                                }
                            }"
                        @click="buyIt()"
                        x-html="loading ? `<i class='uil uil-loding uil-sign-in-alt'></i> Please Wait ...` : '{{ __('Buy a cow') }}'"
                        class="disabled:opacity-50"
                        x-bind:disabled="loading"
                        x-show="!purchased && !thankYou"
                    ></x-button>
                    <x-button disabled class="disabled:opacity-50" x-show="purchased">Already purchased</x-button>


                    <div class="bg-gray-100 rounded-lg py-4 px-6 mb-3 text-base text-gray-500 inline-flex items-center w-full" role="alert" x-show="thankYou">
                        <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="check-circle" class="w-4 h-4 mr-2 fill-current" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                            <path fill="currentColor" d="M504 256c0 136.967-111.033 248-248 248S8 392.967 8 256 119.033 8 256 8s248 111.033 248 248zM227.314 387.314l184-184c6.248-6.248 6.248-16.379 0-22.627l-22.627-22.627c-6.248-6.249-16.379-6.249-22.628 0L216 308.118l-70.059-70.059c-6.248-6.248-16.379-6.248-22.628 0l-22.627 22.627c-6.248 6.248-6.248 16.379 0 22.627l104 104c6.249 6.249 16.379 6.249 22.628.001z"></path>
                        </svg>
                        <b>Success</b> - You have just purchased a cow. Thank you!
                    </div>

                </div>
            </div>
        </div>
    </div>


</x-app-layout>

