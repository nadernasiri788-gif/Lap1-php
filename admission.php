<?php

include "db.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $full_name = trim($_POST["full_name"] ?? "");
    $father_name = trim($_POST["father_name"] ?? "");
    $email = trim($_POST["email"] ?? "");
    $phone = trim($_POST["phone"] ?? "");
    $program = trim($_POST["program"] ?? "");

    $errors = [];

    if ($full_name === "") {
        $errors[] = "Full name is required.";
    }

    if ($father_name === "") {
        $errors[] = "Father's name is required.";
    }

    if ($email === "") {
        $errors[] = "Email is required.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Please enter a valid email address.";
    }

    if ($phone === "") {
        $errors[] = "Phone is required.";
    }

    if ($program === "") {
        $errors[] = "Program is required.";
    }

    if (empty($errors)) {

        $sql = "INSERT INTO applications
                (full_name, father_name, email, phone, program)
                VALUES (?, ?, ?, ?, ?)";

        $stmt = $conn->prepare($sql);

        $stmt->bind_param(
            "sssss",
            $full_name,
            $father_name,
            $email,
            $phone,
            $program
        );

        $stmt->execute();

        $stmt->close();

        header("Location: admission.php");
        exit;
    }
}

$result = $conn->query(
    "SELECT id, full_name, father_name, email, phone, program
     FROM applications
     ORDER BY id DESC"
);

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Student Admission Application</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

</head>

<body>

<div class="container py-5">

    <div class="row justify-content-center">

        <div class="col-md-8">

            <div class="card shadow">

                <div class="card-body p-4">

                    <h1 class="text-center mb-4">
                        Student Admission Application
                    </h1>

                    <?php if (!empty($errors)): ?>

                        <div class="alert alert-danger">

                            <ul class="mb-0">

                                <?php foreach ($errors as $error): ?>

                                    <li>
                                        <?= htmlspecialchars($error) ?>
                                    </li>

                                <?php endforeach; ?>

                            </ul>

                        </div>

                    <?php endif; ?>

                    <form method="post">

                        <div class="mb-3">

                            <label for="full_name" class="form-label">
                                Full Name
                            </label>

                            <input
                                type="text"
                                class="form-control"
                                id="full_name"
                                name="full_name"
                                required
                            >

                        </div>

                        <div class="mb-3">

                            <label for="father_name" class="form-label">
                                Father's Name
                            </label>

                            <input
                                type="text"
                                class="form-control"
                                id="father_name"
                                name="father_name"
                                required
                            >

                        </div>

                        <div class="mb-3">

                            <label for="email" class="form-label">
                                Email
                            </label>

                            <input
                                type="email"
                                class="form-control"
                                id="email"
                                name="email"
                                required
                            >

                        </div>

                        <div class="mb-3">

                            <label for="phone" class="form-label">
                                Phone
                            </label>

                            <input
                                type="tel"
                                class="form-control"
                                id="phone"
                                name="phone"
                                required
                            >

                        </div>

                        <div class="mb-3">

                            <label for="program" class="form-label">
                                Program
                            </label>

                            <select
                                class="form-select"
                                id="program"
                                name="program"
                                required
                            >

                                <option value="">
                                    Select Program
                                </option>

                                <option value="Information Systems">
                                    Information Systems
                                </option>

                                <option value="Software Engineering">
                                    Software Engineering
                                </option>

                                <option value="Computer Science">
                                    Computer Science
                                </option>

                            </select>

                        </div>

                        <div class="d-grid">

                            <button
                                type="submit"
                                class="btn btn-primary"
                            >
                                Submit Application
                            </button>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>


    <div class="mt-5">

        <h2 class="mb-3">
            Submitted Applications
        </h2>

        <div class="table-responsive">

            <table class="table table-bordered table-striped table-hover">

                <thead class="table-dark">

                    <tr>

                        <th>ID</th>
                        <th>Full Name</th>
                        <th>Father's Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Program</th>

                    </tr>

                </thead>

                <tbody>

                    <?php while ($row = $result->fetch_assoc()): ?>

                        <tr>

                            <td>
                                <?= htmlspecialchars($row["id"]) ?>
                            </td>

                            <td>
                                <?= htmlspecialchars($row["full_name"]) ?>
                            </td>

                            <td>
                                <?= htmlspecialchars($row["father_name"]) ?>
                            </td>

                            <td>
                                <?= htmlspecialchars($row["email"]) ?>
                            </td>

                            <td>
                                <?= htmlspecialchars($row["phone"]) ?>
                            </td>

                            <td>
                                <?= htmlspecialchars($row["program"]) ?>
                            </td>

                        </tr>

                    <?php endwhile; ?>

                </tbody>

            </table>

        </div>

    </div>

</div>

</body>

</html>