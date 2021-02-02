<template>
  <default-field :field="field" :errors="errors">
    <template slot="field">
      <vue-tel-input
        v-model="value"
        :disabled="isDisabled"
        :disabledFetchingCountry="true"
        :preferredCountries="preferredCountries"
        :dropdownOptions="dropdownOptions"
        :dynamicPlaceholder="true"
        :inputOptions="options"
        :validCharactersOnly="true"
      ></vue-tel-input>
    </template>
  </default-field>
</template>

<script>
import { FormField, HandlesValidationErrors } from "laravel-nova";
import Vue from "vue";
import { VueTelInput } from "vue-tel-input";

Vue.use(VueTelInput);

export default {
  mixins: [FormField, HandlesValidationErrors],

  components: {
    VueTelInput,
  },

  data() {
    return {
      value: null,
      preferredCountries: ["ar", "br", "usa", "py", "us", "es"],
      options: { showDialCode: true, tabindex: 0 },
      dropdownOptions: { disabledDialCode: false },
    };
  },

  props: ["resourceName", "resourceId", "field"],

  computed: {
    isDisabled() {
      return this.field.disabled || false;
    },
  },
  methods: {
    /*
     * Set the initial, internal value for the field.
     */
    setInitialValue() {
      this.value =
        this.field.value != "+" ? this.field.value : this.field.country;
    },

    /**
     * Fill the given FormData object with the field's internal value.
     */
    fill(formData) {
      formData.append(this.field.attribute, this.value || "");
    },

    /**
     * Update the field's internal value.
     */
    handleChange(value) {
      this.value = value;
    },
  },
};
</script>
