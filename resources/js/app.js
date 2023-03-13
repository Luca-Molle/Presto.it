import './bootstrap';
import 'bootstrap';

import Alpine from 'alpinejs'
 
window.Alpine = Alpine
 
Alpine.start();

// notifica eliminazione annuncio
const toastTrigger = document.getElementById('liveToastBtn')
const toastLiveExample = document.getElementById('liveToast')
if (toastTrigger) {
  toastTrigger.addEventListener('click', () => {
    const toast = new bootstrap.Toast(toastLiveExample)
    toast.show()
  })
}

// notifica edit announcio
const toastTrigger2 = document.getElementById('editBtn')
const toastLiveExample2 = document.getElementById('editToast')
if (toastTrigger2) {
  toastTrigger2.addEventListener('click', () => {
    const toast = new bootstrap.Toast(toastLiveExample2)
    toast.show()
  })
}

// notifica di rifiuto annuncio
const toastTrigger3 = document.getElementById('refuseBtn')
const toastLiveExample3 = document.getElementById('refuseToast')
if (toastTrigger3) {
  toastTrigger3.addEventListener('click', () => {
    const toast = new bootstrap.Toast(toastLiveExample3)
    toast.show()
  })
}
