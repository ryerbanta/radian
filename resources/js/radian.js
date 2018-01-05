import menu from "./navigation";
import toc from "./toc";

const page = document.querySelector('body.page')

menu.init('#primary-menu-button', '.radian__menu');

if (page) {
    toc.init(page.querySelector('.hentry > .header'));
}
