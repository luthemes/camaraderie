/**
 * Primary front-end script.
 *
 * Primary JavaScript file. Any includes or anything imported should be filtered through this file 
 * and eventually saved back into the `/assets/js/app.js` file.
 *
 * @package   Initiator
 * @author    Benjamin Lu <benlumia007@gmail.com>
 * @copyright 2019-2020 Benjamin Lu
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 * @link      https://github.com/benlumia007/initiator
 */
!function(e){var t,a,n,r,s,d,l;if((t=document.getElementById("masthead"))&&void 0!==(a=t.getElementsByTagName("button")[0])){for(r=t.getElementsByTagName("nav")[0],(u=document.createElement("span")).classList.add("screen-reader-text"),u.textContent=camaraderieScreenReaderText.expandMain,a.appendChild(u),d=0,l=(n=t.querySelectorAll(".menu-item-has-children, .page_item_has_children")).length;d<l;d++){var i=document.createElement("button"),c=n[d].querySelector(".sub-menu"),o=document.createElement("span"),u=document.createElement("span");o.classList.add("fontawesome","arrow"),o.setAttribute("aria-hidden","true"),u.classList.add("screen-reader-text"),u.textContent=camaraderieScreenReaderText.expandChild,n[d].insertBefore(i,c),i.classList.add("dropdown-toggle"),i.setAttribute("aria-expanded","false"),i.appendChild(o),i.appendChild(u),i.onclick=function(){var e=this.parentElement,t=e.querySelector(".sub-menu"),a=this.querySelector(".screen-reader-text");-1!==e.className.indexOf("toggled-on")?(e.className=e.className.replace(" toggled-on",""),this.setAttribute("aria-expanded","false"),t.setAttribute("aria-expanded","false"),a.textContent=camaraderieScreenReaderText.expandChild):(e.className+=" toggled-on",this.setAttribute("aria-expanded","true"),t.setAttribute("aria-expanded","true"),a.textContent=camaraderieScreenReaderText.collapseChild)}}if(void 0!==r){for(r.setAttribute("aria-expanded","false"),-1===r.className.indexOf("nav-menu")&&(r.className+=" nav-menu"),a.onclick=function(){u=this.querySelector(".screen-reader-text"),-1!==t.className.indexOf("toggled")?(t.className=t.className.replace(" toggled",""),a.setAttribute("aria-expanded","false"),u.textContent=camaraderieScreenReaderText.expandMain,r.setAttribute("aria-expanded","false")):(t.className+=" toggled",a.setAttribute("aria-expanded","true"),u.textContent=camaraderieScreenReaderText.collapseMain,r.setAttribute("aria-expanded","true"))},d=0,l=(s=r.getElementsByTagName("a")).length;d<l;d++)s[d].addEventListener("focus",h,!0),s[d].addEventListener("blur",h,!0);var m,p,f;!function(e){var t,a,n=e.querySelectorAll(".menu-item-has-children > a, .page_item_has_children > a");if("ontouchstart"in window)for(t=function(e){var t,a=this.parentNode;if(a.classList.contains("focus"))a.classList.remove("focus");else{for(e.preventDefault(),t=0;t<a.parentNode.children.length;++t)a!==a.parentNode.children[t]&&a.parentNode.children[t].classList.remove("focus");a.classList.add("focus")}},a=0;a<n.length;++a)n[a].addEventListener("touchstart",t,!1)}(t),e(window).scroll((function(){e(this).scrollTop()>=m?(p="down")!==f&&(e(".menu-toggle").addClass("hide"),f=p):(p="up")!==f&&(e(".menu-toggle").removeClass("hide"),f=p),m=e(this).scrollTop()}))}else a.style.display="none"}function h(){for(var e=this;-1===e.className.indexOf("nav-menu");)"li"===e.tagName.toLowerCase()&&(-1!==e.className.indexOf("focus")?e.className=e.className.replace(" focus",""):e.className+=" focus"),e=e.parentElement}}(jQuery);