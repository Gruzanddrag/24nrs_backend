window.onload = function(){
    var faqInput = document.querySelector('#faqInput')
    var faqContent = document.querySelector('#faqContent')
    faqInput.oninput = function(e){
        fetch('/landing/faq?question='+e.target.value,{
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
};
