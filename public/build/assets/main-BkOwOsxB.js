document.addEventListener("DOMContentLoaded",function(){a(),d(),l(),u()});function a(){const n=document.querySelector(".mobile-menu-toggle"),t=document.getElementById("mobile-nav");if(!n||!t)return;n.addEventListener("click",function(){const o=this.getAttribute("aria-expanded")==="true";this.setAttribute("aria-expanded",!o),t.hidden=o,document.body.style.overflow=o?"":"hidden"}),t.querySelectorAll("a").forEach(function(o){o.addEventListener("click",function(){n.setAttribute("aria-expanded","false"),t.hidden=!0,document.body.style.overflow=""})}),document.addEventListener("keydown",function(o){o.key==="Escape"&&!t.hidden&&(n.setAttribute("aria-expanded","false"),t.hidden=!0,document.body.style.overflow="",n.focus())})}function d(){document.querySelectorAll('a[href^="#"]').forEach(function(t){t.addEventListener("click",function(r){const o=this.getAttribute("href");if(o==="#")return;const e=document.querySelector(o);if(e){r.preventDefault();const i=document.querySelector(".header").offsetHeight,c=e.getBoundingClientRect().top+window.pageYOffset-i-20;window.scrollTo({top:c,behavior:"smooth"}),history.pushState(null,null,o),e.setAttribute("tabindex","-1"),e.focus({preventScroll:!0})}})})}function l(){const n=document.querySelectorAll("section[id]"),t=document.querySelectorAll(".nav-link, .mobile-nav-link");if(n.length===0||t.length===0)return;const r={root:null,rootMargin:"-50% 0px -50% 0px",threshold:0},o=new IntersectionObserver(function(e){e.forEach(function(i){if(i.isIntersecting){const c=i.target.getAttribute("id");t.forEach(function(s){s.classList.remove("active"),s.getAttribute("href")==="#"+c&&s.classList.add("active")})}})},r);n.forEach(function(e){o.observe(e)})}function u(){const n=document.querySelectorAll(".article-card, .article-section");if(n.length===0)return;const t={root:null,rootMargin:"0px 0px -50px 0px",threshold:.1},r=new IntersectionObserver(function(e){e.forEach(function(i){i.isIntersecting&&(i.target.classList.add("is-visible"),r.unobserve(i.target))})},t);n.forEach(function(e,i){e.style.opacity="0",e.style.transform="translateY(20px)",e.style.transition="opacity 0.4s ease, transform 0.4s ease",e.style.transitionDelay=i%3*.1+"s",r.observe(e)});const o=document.createElement("style");o.textContent=`
        .is-visible {
            opacity: 1 !important;
            transform: translateY(0) !important;
        }
    `,document.head.appendChild(o)}function p(){document.querySelectorAll("pre code").forEach(function(r){const o=r.parentElement,e=document.createElement("button");e.className="copy-code-btn",e.textContent="Копировать",e.setAttribute("aria-label","Копировать код в буфер обмена"),e.addEventListener("click",function(){const i=r.textContent;navigator.clipboard.writeText(i).then(function(){e.textContent="Скопировано!",e.classList.add("copied"),setTimeout(function(){e.textContent="Копировать",e.classList.remove("copied")},2e3)}).catch(function(){e.textContent="Ошибка",setTimeout(function(){e.textContent="Копировать"},2e3)})}),o.style.position="relative",o.appendChild(e)});const t=document.createElement("style");t.textContent=`
        .copy-code-btn {
            position: absolute;
            top: 10px;
            right: 10px;
            padding: 6px 12px;
            background-color: var(--color-red);
            color: white;
            border: none;
            border-radius: 4px;
            font-size: 12px;
            cursor: pointer;
            opacity: 0;
            transition: opacity 0.2s ease, background-color 0.2s ease;
        }

        pre:hover .copy-code-btn {
            opacity: 1;
        }

        .copy-code-btn:hover {
            background-color: var(--color-red-dark);
        }

        .copy-code-btn.copied {
            background-color: #28a745;
        }

        @media (max-width: 768px) {
            .copy-code-btn {
                opacity: 1;
                padding: 4px 8px;
                font-size: 11px;
            }
        }
    `,document.head.appendChild(t)}document.querySelector("pre code")&&document.addEventListener("DOMContentLoaded",p);function f(){const n=document.querySelector(".article");if(!n)return;const t=document.createElement("div");t.className="reading-progress",t.setAttribute("role","progressbar"),t.setAttribute("aria-label","Прогресс чтения статьи"),t.setAttribute("aria-valuemin","0"),t.setAttribute("aria-valuemax","100"),t.setAttribute("aria-valuenow","0"),document.body.appendChild(t);const r=document.createElement("style");r.textContent=`
        .reading-progress {
            position: fixed;
            top: 0;
            left: 0;
            width: 0%;
            height: 3px;
            background-color: var(--color-red);
            z-index: 1001;
            transition: width 0.1s ease;
        }
    `,document.head.appendChild(r),window.addEventListener("scroll",function(){const o=n.getBoundingClientRect(),e=n.offsetHeight,i=window.innerHeight;let c=0;o.top<=0&&(c=Math.min(100,Math.abs(o.top)/(e-i)*100)),t.style.width=c+"%",t.setAttribute("aria-valuenow",Math.round(c))})}document.querySelector(".article")&&document.addEventListener("DOMContentLoaded",f);document.addEventListener("keydown",function(n){if(n.key==="?"&&!n.ctrlKey&&!n.metaKey){const t=document.activeElement;t.tagName!=="INPUT"&&t.tagName!=="TEXTAREA"&&(n.preventDefault(),m())}});function m(){const n=[{key:"?",description:"Показать горячие клавиши"},{key:"Esc",description:"Закрыть меню / диалог"},{key:"↑ / ↓",description:"Прокрутка страницы"}];console.log("=== Xavier Fox Communications - Горячие клавиши ==="),n.forEach(function(t){console.log(t.key+" - "+t.description)})}"serviceWorker"in navigator&&window.addEventListener("load",function(){});
