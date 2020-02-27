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
            let searchInput = document.querySelector('.faq__search-input')
            if (searchInput) {
                let getValue = elem => {
                    let value = elem.value
                    return value
                }
                let targets = document.querySelectorAll('.faq__item-body')
                let searchBtn = document.querySelector('.faq__search-btn')
                searchBtn.addEventListener('click', event => {
                    event.preventDefault()
                    let toSearch = getValue(searchInput)
                    targets.forEach(target => {
                        let text = target.textContent
                        if (target.textContent.includes(toSearch)) {
                            target.parentElement.parentElement.style.display = 'block'
                        } else {
                            target.parentElement.parentElement.style.display = 'none'
                        }
                    })
                })
            }
        })
    }
};
