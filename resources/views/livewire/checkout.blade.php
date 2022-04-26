<div>
  <h1 class="text-3xl text-gray-700 uppercase font-bold text-center mt-20 mb-10">Checkout</h1>

  <div class="flex space-x-14">
    <div class="w-2/3 space-y-8">
      <x-card title="Contact" icon="user-circle">
        <x-jet-input type="text" placeholder="Name"/>
        <x-jet-input type="email" placeholder="Email"/>

        <div class="flex space-x-4">
          <x-jet-input type="tel" class="w-1/4" placeholder="Zip code"/>
          <x-jet-input type="text" class="w-2/4" placeholder="Address line 1"/>
          <x-jet-input type="text" class="w-1/4" placeholder="Address line 2"/>
        </div>

        <div class="flex space-x-4">
          <x-jet-input type="text" placeholder="City"/>
          <x-jet-input type="text" placeholder="State"/>
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
        <x-jet-input type="text" placeholder="Name"/>

        <div class="flex space-x-4">
          <x-jet-input type="tel" class="w-1/4" placeholder="Zip code"/>
          <x-jet-input type="text" class="w-2/4" placeholder="Address line 1"/>
          <x-jet-input type="text" class="w-1/4" placeholder="Address line 2"/>
        </div>

        <div class="flex space-x-4">
          <x-jet-input type="text" placeholder="City"/>
          <x-jet-input type="text" placeholder="State"/>
        </div>

        <div class="flex items-center justify-between text-gray-400">
          <x-input.switch>Save this address for delivery?</x-input.switch>
        </div>
      </x-card>

      <x-card title="Payment" icon="currency-dollar">
        <x-jet-input type="text" placeholder="Cardholder Name"/>

        <div class="flex space-x-4">
          <x-jet-input type="tel" class="w-3/5" placeholder="Card Number"/>
          <x-jet-input type="tel" class="w-1/5" placeholder="MM/YY"/>
          <x-jet-input type="tel" class="w-1/5" placeholder="CVV"/>
        </div>

        <div class="flex items-center justify-between text-gray-400">
          <x-input.switch>Save this card for next purchase?</x-input.switch>
        </div>
      </x-card>
    </div>

    <div class="w-1/3">
      sda[-okfa-podfjki0wjdf0iwjf0ijwef0ijw0ifjhw0ifw0hf0whfiwhf9urwhgúwrh
    </div>
  </div>
</div>
