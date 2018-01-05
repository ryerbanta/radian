/**
 * Depressing the menu `<button>` when it's present on small screens
 * will toggle the display class on the top menu.
 */
export default {

    button: null,

    container: null,

    isOpen: false,

    close() {
        this.button.classList.remove('active');
        this.button.setAttribute('aria-pressed', 'false');
        this.container.classList.remove('d-none');
        this.container.setAttribute('aria-expanded', 'false');
        this.isOpen = false;
    },

    init(buttonSelector, containerSelector) {
        this.setButton(buttonSelector);
        this.setContainer(containerSelector);

        this.button.addEventListener('click', () => {this.toggle()});
    },

    setButton(selector) {
        this.button = document.querySelector(selector);
    },

    setContainer(selector) {
        this.container = document.querySelector(selector);
    },

    open() {
        this.button.classList.add('active');
        this.button.setAttribute('aria-pressed', 'true');
        this.container.classList.add('d-none');
        this.container.setAttribute('aria-expanded', 'true');
        this.isOpen = true;
    },

    toggle() {
        if (this.isOpen) {
            this.close();
        } else {
            this.open();
        }
    },
};