import './bootstrap';
import './../../vendor/power-components/livewire-powergrid/dist/powergrid';
import flatpickr from "flatpickr";
import {Vietnamese} from "flatpickr/dist/l10n/vn.js"

flatpickr.defaultConfig.dateFormat = "d/m/Y";
flatpickr.localize(Vietnamese);

window.flatpickr = flatpickr;
