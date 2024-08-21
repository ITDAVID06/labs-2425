<?php

require "questions/helpers.php";

// Check if HTTP method is POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: index.php');
    exit();
}

$complete_name = isset($_POST['complete_name']) ? htmlspecialchars(trim($_POST['complete_name'])) : '';
$email = isset($_POST['email']) ? htmlspecialchars(trim($_POST['email'])) : '';
$birthdate = isset($_POST['birthdate']) ? htmlspecialchars(trim($_POST['birthdate'])) : '';
$contact_number = isset($_POST['contact_number']) ? htmlspecialchars(trim($_POST['contact_number'])) : '';
$agree = isset($_POST['agree']) ? htmlspecialchars(trim($_POST['agree'])) : '';

$answer = $_POST['answer'] ?? null;
$answers = $_POST['answers'] ?? [];
if ($answer !== null) {
    $answers[] = $answer;
}

$questions = retrieve_questions();
$questions = $questions['questions'] ?? []; // Ensure questions is an array

// // Debugging output to verify structure
// echo '<pre>';
// print_r($questions);
// echo '</pre>';

if (!is_array($questions)) {
    echo "Error: Questions could not be retrieved.";
    exit();
}
?>

<html>
<head>
    <meta charset="utf-8">
    <title>IPT10 Laboratory Activity #3A</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@1.0.2/css/bulma.min.css" />
    <script>
        // Auto-submit form after 60 seconds
        document.addEventListener('DOMContentLoaded', function() {
            setTimeout(function() {
                document.getElementById('quiz-form').submit();
            }, 60000);
        });
    </script>
</head>
<body>
<section class="section">
    <h1 class="title">Quiz</h1>
    <form id="quiz-form" method="POST" action="result.php">
        <input type="hidden" name="complete_name" value="<?php echo $complete_name; ?>" />
        <input type="hidden" name="email" value="<?php echo $email; ?>" />
        <input type="hidden" name="birthdate" value="<?php echo $birthdate; ?>" />
        <input type="hidden" name="contact_number" value="<?php echo $contact_number; ?>" />
        <input type="hidden" name="agree" value="<?php echo $agree; ?>" />


        <!-- Display all questions and options -->
        <?php foreach ($questions as $index => $question): ?>
            <div class="box">
                <?php if (!isset($question['question']) || !isset($question['options'])): ?>
                    <p>Question data is missing or malformed.</p>
                <?php else: ?>
                    <h2 class="subtitle">Question <?php echo $index + 1; ?></h2>
                    <p><?php echo htmlspecialchars($question['question']); ?></p>
                    <?php foreach ($question['options'] as $option): ?>
                        <div class="field">
                            <div class="control">
                                <label class="radio">
                                    <input type="radio" name="answers[<?php echo $index; ?>]" value="<?php echo htmlspecialchars($option['key']); ?>" <?php echo isset($answers[$index]) && $answers[$index] == $option['key'] ? 'checked' : ''; ?> />
                                    <?php echo htmlspecialchars($option['value']); ?>
                                </label>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        <?php endforeach; ?>
        <?php $complete_name ?>

        <!-- Submit button -->
        <button type="submit" class="button is-primary">Submit</button>
    </form>
</section>
</body>
</html>
