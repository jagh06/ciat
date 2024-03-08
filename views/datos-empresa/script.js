function nextStep(stepId) {
    var currentStep = document.getElementById(stepId);
    var nextStep = currentStep.nextElementSibling;
    currentStep.style.display = 'none';
    nextStep.style.display = 'block';
}

function prevStep(stepId) {
    var currentStep = document.getElementById(stepId);
    var prevStep = currentStep.previousElementSibling;
    currentStep.style.display = 'none';
    prevStep.style.display = 'block';
}
