import './bootstrap';
import Alpine from 'alpinejs';
import SimpleMaskMoney from 'simple-mask-money';
import currency from 'currency.js';

window.Alpine = Alpine;
window.currency = currency;
window.SimpleMaskMoney = SimpleMaskMoney;

Alpine.start();
