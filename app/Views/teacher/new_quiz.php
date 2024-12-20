<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= isset($quiz) ? 'Edit' : 'Create'; ?> Quiz | EducAchieve</title>
    <link rel="stylesheet" href="<?= base_url('css/register.css'); ?>">
</head>
<body>
    <section class="teachers-info">
        <h2><?= isset($quiz) ? 'Edit' : 'Create'; ?> Quiz</h2>

        <?php if (session()->get('errors')): ?>
            <div class="error-message">
                <?= implode('<br>', session()->get('errors')); ?>
            </div>
        <?php endif; ?>

        <form method="POST" action="<?= isset($quiz) ? '/teacher/quiz/update/' . esc($quiz['quiz_id']) : '/teacher/quiz/store'; ?>" enctype="multipart/form-data">
            <?= csrf_field(); ?>

            <label for="subject_name">Subject Name:</label>
            <input type="text" name="subject_name" id="subject_name" value="<?= isset($quiz) ? esc($quiz['subject_name']) : ''; ?>" required>

            <label for="material_name">Material Name:</label>
            <input type="text" name="material_name" id="material_name" value="<?= isset($quiz) ? esc($quiz['material_name']) : ''; ?>" required>

            <label for="questions">Upload Questions (File):</label>
            <input type="file" name="questions" id="questions" accept=".pdf,.docx,.txt" <?= isset($quiz) ? '' : 'required'; ?>>

            <label for="answers">Upload Answers (File):</label>
            <input type="file" name="answers" id="answers" accept=".pdf,.docx,.txt" <?= isset($quiz) ? '' : 'required'; ?>>

            <button type="submit"><?= isset($quiz) ? 'Update' : 'Create'; ?> Quiz</button>
        </form>
    </section>

    <footer>
        <p>&copy; 2024 EducAchieve. All rights reserved.</p>
    </footer>
</body>
</html>