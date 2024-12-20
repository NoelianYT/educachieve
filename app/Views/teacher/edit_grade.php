<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Grade | EducAchieve</title>
    <link rel="stylesheet" href="<?= base_url('css/register.css'); ?>">
</head>
<body>
    <section class="teachers-info">
        <h2>Form Penilaian</h2>
        <form method="post" action="/teacher/grades/update/<?= esc($grade['grade_id']); ?>">
            <label for="subject_id">Subject:</label>
            <select name="subject_id" id="subject_id" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px; font-size: 16px; background-color: #fff; transition: border-color 0.3s ease;">
                <?php foreach ($subjects as $subject): ?>
                    <option value="<?= esc($subject['subject_id']); ?>" <?= $subject['subject_id'] == esc($grade['subject_id']) ? 'selected' : ''; ?>>
                        <?= esc($subject['subject_name']); ?>
                    </option>
                <?php endforeach; ?>
            </select>

            <label for="score">Score:</label>
            <input type="number" name="score" id="score" value="<?= esc($grade['score']); ?>" required>

            <button type="submit">Save Changes</button>
        </form>
    </section>

    <footer>
        <p>&copy; 2024 EducAchieve. All rights reserved.</p>
    </footer>
</body>
</html>