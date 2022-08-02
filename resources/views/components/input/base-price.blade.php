@props(['padding' => 'p-0'])

<div
  x-data="basePrice()"
  x-init="mounted()"
>
  <input
    x-model="maskedValue"
    x-ref="input"
    @input="onChange"
    @focus="$dispatch('focused')"
    @blur="$dispatch('blurred')"
    inputmode="numeric"
    type="text"
    class="w-full {{ $padding }} placeholder-gray-400 border-0 ring-0 outline-none focus:ring-0 focus:outline-none bg-transparent"
    {{ $attributes->except(['wire:model', 'wire:model.defer','wire:model.debounce']) }}
  />
</div>

<script>
  function basePrice() {
    return {
      integerValue: @entangle($attributes->wire('model')), // "Amarração" do blade com o Livewire a partir do alpine
      maskedValue: null,
      prefix: '$ ',

      mounted() {
        this.maskedValue = this.mask(this.integerValue);
      },

      mask(integerNumber) {
        if (integerNumber == null) return null;
        return currency(integerNumber, {fromCents: true, symbol: this.prefix}).format();
      },

      onChange({target: input}) {
        const integerValue = input.value.replaceAll(/\D/g, '');
        this.integerValue = +integerValue; // o '+' faz o js tentar converter pra número a variável q está sendo passada
        this.maskedValue = this.mask(this.integerValue);
      }
    }
  }
</script>
