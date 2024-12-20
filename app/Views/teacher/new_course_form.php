<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create New Course | EducAchieve</title>
    <link rel="stylesheet" href="<?= base_url('css/register.css'); ?>">
</head>
<body>
    <section class="new-course-form">
        <h2>Create New Course</h2>
        <form action="/teacher/course/store" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="class_id">Class</label>
                <select id="class_id" name="class_id">
                    <?php foreach ($classes as $class): ?>
                        <option value="<?= $class['class_id']; ?>"><?= esc($class['class_level']); ?><?= esc($class['class_name']); ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-group">
                <label for="teacher_id">Teacher</label>
                <select id="teacher_id" name="teacher_id">
                    <?php foreach ($teachers as $teacher): ?>
                        <option value="<?= $teacher['teacher_id']; ?>"><?= esc($teacher['first_name']); ?> <?= esc($teacher['last_name']); ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-group">
                <label for="subject_name">Subject Name</label>
                <input type="text" id="subject_name" name="subject_name" required>
            </div>

            <div class="form-group">
                <label for="material_name">Material Name</label>
                <input type="text" id="material_name" name="material_name" required>
            </div>

            <div class="form-group">
                <label for="material">Material</label>
                <input type="file" id="material" name="material" required>
            </div>

            <button type="submit" class="submit-button">Save Course</button>
        </form>
    </section>
    <footer>
        <p>&copy; 2024 EducAchieve. All rights reserved.</p>
    </footer>
</body>
</html>