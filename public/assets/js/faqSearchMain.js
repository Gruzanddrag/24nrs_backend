window.onload = function(){
    var faqInput = document.querySelector('#faqInput')
    var faqContent = document.querySelector('#faqContent')
    loadQuestions(faqInput.value)
    faqInput.oninput = function(e){
        loadQuestions(e.target.value)
    }
};


function loadQuestions(question){
    fetch('/landing/faq-main?question='+question,{
        method: 'get',

    }).then(res => res.text())
        .then(res => faqContent.innerHTML = res)
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
}
