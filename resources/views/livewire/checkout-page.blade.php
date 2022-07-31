@push('scripts')
  <script src="https://js.stripe.com/v3/"></script>
  <script>
    const stripe = Stripe('{{ env('STRIPE_KEY') }}');
  </script>
@endpush

<div>
  <h1 class="text-3xl text-gray-700 uppercase font-bold text-center mt-20 mb-10">Checkout</h1>

  <div class="flex space-x-14">
    <div class="w-2/3 space-y-8">
      <x-card title="Contact" icon="user-circle">
        <x-input type="text" placeholder="Name"/>
        <x-input type="email" placeholder="Email"/>

        <div class="flex space-x-4">
          <x-input type="tel" class="w-1/4" placeholder="Zip code"/>
          <x-input type="text" class="w-2/4" placeholder="Address line 1"/>
          <x-input type="text" class="w-1/4" placeholder="Address line 2"/>
        </div>

        <div class="flex space-x-4">
          <x-input type="text" placeholder="City"/>
          <x-input type="text" placeholder="State"/>
        </div>

        <div class="flex items-center justify-between text-gray-400">
          <x-input.switch>Save this address as default?</x-input.switch>
        </div>

        <div class="text-center text-gray-400">
          Clicking on the button bellow you agree with our
          <a href="#" class="text-primary-500 hover:text-primary-600">terms and services.</a>
        </div>
      </x-card>

      <x-card title="Shipping" icon="truck">
        <x-input type="text" placeholder="Name"/>

        <div class="flex space-x-4">
          <x-input type="tel" class="w-1/4" placeholder="Zip code"/>
          <x-input type="text" class="w-2/4" placeholder="Address line 1"/>
          <x-input type="text" class="w-1/4" placeholder="Address line 2"/>
        </div>

        <div class="flex space-x-4">
          <x-input type="text" placeholder="City"/>
          <x-input type="text" placeholder="State"/>
        </div>

        <div class="flex items-center justify-between text-gray-400">
          <x-input.switch>Save this address for delivery?</x-input.switch>
        </div>
      </x-card>

      <x-card title="Payment" icon="currency-dollar">
        <x-input type="text" placeholder="Cardholder Name"/>

        <div class="flex space-x-4">
          <x-input type="tel" class="w-3/5" placeholder="Card Number"/>
          <x-input type="tel" class="w-1/5" placeholder="MM/YY"/>
          <x-input type="tel" class="w-1/5" placeholder="CVV"/>
        </div>

        <div class="flex items-center justify-between text-gray-400">
          <x-input.switch>Save this card for next purchase?</x-input.switch>
        </div>
      </x-card>
    </div>

    <div class="w-1/3">
      <div class="sticky top-4 bg-white rounded-lg overflow-hidden ">
        <div class="pt-8 px-8 pb-4">
          <h3 class="text-gray-900 text-xl text-center">Checkout Summary</h3>

          <div class="mt-4 flex items-center justify-between text-gray-700">
            <span>2 products</span>
            <span>$ 1,280.00</span>
          </div>

          <div class="flex items-center justify-between text-gray-700">
            <span>Shipping</span>
            <span>$ 45.00</span>
          </div>

          <div class="flex items-center justify-between text-gray-400">
            <span>Discount</span>
            <span>$ 0.00</span>
          </div>

          <div class=" flex items-center space-x-2.5 text-gray-700">
            <x-input type="text" class="w-3/6 py-1 px-1.5" placeholder="Coupon"/>
            <x-button class="py-1 px-1.5">
              <x-icon.plus class="h-5 w-5 text-white"/>
            </x-button>
          </div>

          <div class="mt-2 flex items-center justify-between text-xl font-bold text-gray-900">
            <span>Total</span>
            <span>$ 1,325.00</span>
          </div>
        </div>
        <button
          x-data="{
            async confirmPayment() {
              try {
                const stripeSession = await @this.confirmPayment();
                const {error} = stripe.redirectToCheckout({sessionId: stripeSession.id});

                if (error) {
                  alert(error.message);
                }
              } catch (error) {
                 console.error('ERROR', error);
              }
            }
          }"
          class="bg-gray-200 py-4 text-gray-400 w-full space-x-3 flex items-center justify-center"
          @click="confirmPayment"
        >
          <x-icon.lock-closed class="w-4 h-4 text-green-300"/>
          <span>Confirm Payment</span>
        </button>
      </div>
    </div>
  </div>
</div>
