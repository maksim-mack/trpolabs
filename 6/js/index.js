const button = document.querySelector('#add-count');
const input = document.querySelector('#count');
const container = document.querySelector('.form-group');
const submitContainer = document.querySelector('#submit-container');
function addNewInput(id) {
    const container = document.createElement('div');
    const label = document.createElement('label');
    container.classList.add(...['d-flex','justify-content-between','mt-4']);
    label.textContent = `Возраст посететителя № ${id}`;
    const ageInput = document.createElement('input');
    ageInput.setAttribute('type','number');
    ageInput.setAttribute('name','ages[]');
    ageInput.setAttribute('min','0');
    ageInput.classList.add(...['form-control','col-7']);
    container.appendChild(label);
    container.appendChild(ageInput);
    return container;
}

function clearInputs(oldInputs) {
    if (oldInputs.length > 0) {
        oldInputs.forEach((input) => {
            input.parentElement.remove()
        });
    }
}

function toggleClass(className1, className2) {
    submitContainer.classList.remove(className1);
    submitContainer.classList.add(className2);
}
button.addEventListener('click', (evt) => {

    let iterations = parseInt(input.value);
    const oldInputs =  document.querySelectorAll('input[name="ages[]"]');
    clearInputs(oldInputs);
    if (iterations > 0) {
        toggleClass('d-none','d-flex');
    } else {
        toggleClass('d-flex','d-none')
    }
    while (iterations > 0) {
        const layout = addNewInput(iterations);
        container.appendChild(layout);
        iterations--;
    }

});


