window.onload = function(){
    var faqInput = document.querySelector('#faqInput')
    var faqFind = document.querySelector('#faqFind')
    var faqContent = document.querySelector('#faqContent')
    var formNotFound = document.querySelector('#formNotFound')
    var notFound = document.querySelector('#notFound')
    loadQuestions(faqInput.value)
    faqInput.onchange = function(e){
        loadQuestions(e.target.value)
    }
    faqFind.onclick = function() {
        loadQuestions(faqInput.value)
    }
};


function loadQuestions(question){
    fetch('/landing/faq-main?question='+question,{
        method: 'get',
    })
    .then(res => res.ok ? res : Promise.reject(res))
    .then(res => res.text())
    .then(res => {
        faqContent.setAttribute("style", "display: block");
        notFound.setAttribute("style", "display: none");
        faqContent.innerHTML = res
    })
    .then(()=>{
        let accordionItems = document.querySelectorAll('.faq__item')
        accordionItems.forEach(item => {
            let trigger = item.querySelector('.faq__item-header-trigger')
            let target = item.querySelector('.faq__item-collapse')
            let toggleClass = () => {
                if (item.classList.contains('is-collapsed')) {
                    item.classList.remove('is-collapsed')
                } else {
                    item.classList.add('is-collapsed')
                }
            }
            trigger.addEventListener('click', toggleClass)
        })
    })
    .catch(err => {
        if(err.status == 404) {
            notFound.setAttribute("style", "display: block");
            faqContent.setAttribute("style", "display: none");
        }
    })
}

function sendFaqForm(e) {
    e.preventDefault()
    fetch('api/form/faq',{
        method: 'post',
    })
    .then(res => res.status === 200 ? res : Promise.reject(res))
    .then(res => res.text())
    .then(html => {
        notFound.innerHTML = html
    })
}
