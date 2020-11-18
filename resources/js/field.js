Nova.booting((Vue, router, store) => {
  Vue.component('index-phone-number-input', require('./components/IndexField'))
  Vue.component('detail-phone-number-input', require('./components/DetailField'))
  Vue.component('form-phone-number-input', require('./components/FormField'))
})
