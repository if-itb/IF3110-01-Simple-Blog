/**
 * Detects whether the browser supports <input type='date'> tag
 * @return {boolean} true if supports <input type='date'> tag
 */
function checkDateInput() {
    var input = document.createElement('input');
    input.setAttribute('type','date');

    var notADateValue = 'not-a-date';
    input.setAttribute('value', notADateValue); 

    return !(input.value === notADateValue);
}