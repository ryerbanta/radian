/**
 * Generates a table of contents with jump links based off section headings.
 */
export default {

    links : [],

    markup: null,

    generateMarkup() {
        const nav = document.createElement('nav');

        nav.classList.add('col-md-8');
        nav.classList.add('col-lg-6');
        nav.classList.add('p-md-0');
        nav.classList.add('mb-5');
        nav.setAttribute('role', 'navigation');

        this.links.forEach((link) => {
            const linkElement = document.createElement('a');
            linkElement.classList.add('d-block');
            linkElement.href = '#' + link.id;
            linkElement.textContent = link.title;
            nav.appendChild(linkElement);
        });

        this.markup = nav;
    },

    init(selector) {
        this.setLinks();
        this.generateMarkup();
        this.inject(selector);
    },

    inject(selector) {
        selector.appendChild(this.markup);
    },

    setLinks() {
        const sections = document.querySelectorAll('section[id]');
        let links = [];

        [].forEach.call(sections, function(section) {
            const link = {
                id: section.getAttribute('id'),
                title: section.getAttribute('title'),
            };
            links.push(link);
        });

        this.links = links;
    },
};