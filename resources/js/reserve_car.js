import 'flowbite/dist/datepicker';

Alpine.data('form', () => ({
    credits: 0, // Bound by external script, see `reserve.blade.php`
    pricing: 0, // Bound by external script
    duration: 1,
    date: '',
    hour: '',
    minutes: '',
    errors: [],
    disableSubmit: false,
    async submit() {
        this.$refs.form.submit();
    },
    init() {
        this.pricing = data.pricing;
        this.credits = data.credits;
    }
}));
