<div id="AddTemplateBar" class="sdbr-sidebar-2x">
    <button class="sdbr-close-button" onclick="closeAddTemplate()">&times;</button>
    <h2>Add Template</h2>
    <hr>

    <form class="lead-form" id="AddTemplateForm">
        <div class="form-group row mt-1">
            <div class="col-lg-6">
                <label class="form-label" for="AlertCategory">Select Category:</label>
                <select class="form-select" id="AlertCategory">
                    <option selected disabled>Select status</option>
                    <option>Alert</option>
                    <option>New Update</option>
                    <option>Offer Templates</option>
                </select>
                <div class="error-message" id="AlertCategoryError">Category is required.</div>
            </div>
            <div class="col-lg-6">
                <label class="form-label" for="TemplateTitle">Template Title:</label>
                <input type="text" class="form-control" id="TemplateTitle" placeholder="Enter Template Title">
                <div class="error-message" id="TemplateTitleError">Template Title is required.</div>
            </div>
        </div>
        <div class="form-group row mt-1">
            <div class="col-lg-12">
                <label class="form-label" for="TemplateContent">Template Content:</label>
                <textarea class="form-control" id="TemplateContent" placeholder="Enter Template content" oninput="updateCharCount()"></textarea>
                <small>Content character count: <span class="msg-letters">0</span></small>
                <div class="error-message" id="TemplateContentError">Content should be <= 160 characters only.</div>
                <div class="error-message" id="VariableError" style="display: none;">You can only add up to 2 variables.</div>
                <div class="mt-2">
                    <label class="form-label">Add variables:</label>
                    <select class="form-select d-inline w-auto variableselact" style="width:40% !important;" id="TemplateVariables">
                        <option value="{variable_one}">Variable One</option>
                        <option value="{variable_two}">variable_two</option>
                    </select>
                    <button type="button" class="btn btn-primary variablebtn btn-sm" id="AddVariableButton">Insert</button>
                </div>
            </div>
        </div>
        <div class="form-group row mt-1">
            <div class="col-lg-6">
                <label class="form-label" for="TemplateCAT">CTA Name:</label>
                <input type="text" class="form-control" id="TemplateCAT" placeholder="Enter CTA Title">
                <div class="error-message" id="TemplateCATError">CTA Title is required.</div>
            </div>
            <div class="col-lg-6">
                <label class="form-label" for="TemplateCTAURL">CTA Action:</label>
                <input type="url" class="form-control" id="TemplateCTAURL" placeholder="Enter CTA URL">
                <div class="error-message" id="TemplateCTAURLError">CTA URL is required.</div>
            </div>
        </div>
        <button type="button" class="btn btn-primary mt-2 me-1" id="SubmitForm">Submit</button>
        <button type="reset" class="btn mt-2 btn-secondary">Clear</button>
    </form>



</div>

<script>
    // Function to update the character count
    function updateCharCount() {
        var textContent = document.getElementById('TemplateContent').value;
        var letterCount = textContent.length;
        var letterSpan = document.querySelector('.msg-letters');

        // Update character count
        letterSpan.textContent = letterCount;

        // Apply red color if character count exceeds 160
        if (letterCount > 160) {
            letterSpan.classList.add('red');
        } else {
            letterSpan.classList.remove('red');
        }
    }
</script>


<script>

  let variableCount = 0; // Counter for inserted variables
  const maxVariables = 2; // Maximum allowed variables

  // Function to insert a variable at the cursor position
  function insertVariableAtCursor(variable) {
    const templateContent = document.getElementById('TemplateContent');
    const cursorPosition = templateContent.selectionStart;
    const currentValue = templateContent.value;

    templateContent.value =
      currentValue.substring(0, cursorPosition) +
      variable +
      currentValue.substring(cursorPosition);

    variableCount++; // Increment the variable count after insertion
  }

  // Adding a new variable
  document.getElementById('AddVariableButton').addEventListener('click', function () {
    const variableDropdown = document.getElementById('TemplateVariables');
    const selectedVariable = variableDropdown.value;
    const variableError = document.getElementById('VariableError');

    if (selectedVariable) {
      if (variableCount < maxVariables) {
        insertVariableAtCursor(selectedVariable);
        variableDropdown.selectedIndex = 0; // Reset dropdown selection

        // Hide the error message if variables are within the limit
        variableError.style.display = 'none';
      } else {
        // Show error if more than 2 variables are added
        variableError.textContent = `You can only add up to ${maxVariables} variables.`;
        variableError.style.display = 'block';
      }
    }
  });

  // Function to remove a variable
  function removeVariable(variable) {
    const templateContent = document.getElementById('TemplateContent');
    const content = templateContent.value;

    // Check if the variable exists and remove it
    if (content.includes(variable)) {
      templateContent.value = content.replace(variable, '');
      variableCount--; // Decrement the variable count after removal
    }
  }

  // Event listener for template content changes (removal of variables)
  document.getElementById('TemplateContent').addEventListener('input', function () {
    const templateContent = document.getElementById('TemplateContent');
    const variableError = document.getElementById('VariableError');

    // If no variables are present in the textarea, reset the variable count to 0
    const variablesInContent = templateContent.value.match(/\{.*?\}/g); // Detect variables in the text
    if (!variablesInContent || variablesInContent.length === 0) {
      variableCount = 0;
      variableError.style.display = 'none'; // Hide error if no variables are present
    } else {
      variableCount = variablesInContent.length;
    }
  });

  // Submit button click handler for form validation
  document.getElementById('SubmitForm').addEventListener('click', function () {
    let isValid = true;

    function validateField(id, errorId, condition, errorMessage) {
      const field = document.getElementById(id);
      const errorField = document.getElementById(errorId);

      if (condition) {
        errorField.style.display = 'none';
        field.classList.remove('is-invalid');
      } else {
        errorField.textContent = errorMessage;
        errorField.style.display = 'block';
        field.classList.add('is-invalid');
        isValid = false;
      }
    }

    // Validate fields
    validateField(
      'AlertCategory',
      'AlertCategoryError',
      document.getElementById('AlertCategory').value !== 'Select status',
      'Category is required.'
    );

    validateField(
      'TemplateTitle',
      'TemplateTitleError',
      document.getElementById('TemplateTitle').value.trim() !== '',
      'Template Title is required.'
    );

    const templateContent = document.getElementById('TemplateContent').value.trim();
    validateField(
      'TemplateContent',
      'TemplateContentError',
      templateContent.length <= 160 && templateContent !== '',
      'Content should be <= 160 characters and not empty.'
    );

    validateField(
      'TemplateCAT',
      'TemplateCATError',
      document.getElementById('TemplateCAT').value.trim() !== '',
      'CTA Title is required.'
    );

    validateField(
      'TemplateCTAURL',
      'TemplateCTAURLError',
      /^(https?:\/\/[^\s]+)$/.test(document.getElementById('TemplateCTAURL').value.trim()),
      'Enter a valid CTA URL.'
    );

    if (isValid) {
      alert('Form successfully submitted!');
      document.getElementById('AddTemplateForm').reset();
      variableCount = 0; // Reset variable counter after submission
    }
  });

  // Reset form and variable counter on clear
  document.querySelector('form').addEventListener('reset', () => {
    variableCount = 0;
    document.getElementById('VariableError').style.display = 'none'; // Hide error on reset
  });
</script>





