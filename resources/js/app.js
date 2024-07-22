import "./bootstrap";

// import Alpine from "alpinejs";
// window.Alpine = Alpine;
// Alpine.start();

import "bootstrap";
import "../css/app.scss";
import { Tooltip } from "bootstrap";
import '@flaticon/flaticon-uicons/css/all/all.css';

document.addEventListener("DOMContentLoaded", (event) => {
    var tooltipTriggerList = [].slice.call(
        document.querySelectorAll('[data-bs-toggle="tooltip"]')
    );
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new Tooltip(tooltipTriggerEl);
    });
});

Echo.channel("comments").listen("CommentCreated", (event) => {
    Livewire.dispatch("comment-created");
});

Echo.channel("reactions").listen("ArticleReactionEvent", (event) => {
    Livewire.dispatch("reaction-created");
});
