<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Система управління турнірами</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 0; padding: 20px; background-color: #f0f0f0; }
        .container { background-color: white; border: 1px solid #ccc; border-radius: 5px; padding: 10px; margin-bottom: 20px; }
        table { width: 100%; border-collapse: collapse; margin-bottom: 20px; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; font-weight: bold; }
        tr:nth-child(even) { background-color: #f9f9f9; }
        form { margin-bottom: 20px; }
        input[type="text"], input[type="date"], input[type="datetime-local"], select { margin-bottom: 10px; padding: 5px; width: 200px; }
        input[type="submit"] { padding: 5px 10px; background-color: #4CAF50; color: white; border: none; cursor: pointer; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Турніри</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Назва</th>
                    <th>Дата початку</th>
                    <th>Дата закінчення</th>
                    <th>Статус</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($tournaments as $tournament): ?>
                <tr>
                    <td><?= htmlspecialchars($tournament['tournament_id']) ?></td>
                    <td><?= htmlspecialchars($tournament['name']) ?></td>
                    <td><?= htmlspecialchars($tournament['start_date']) ?></td>
                    <td><?= htmlspecialchars($tournament['end_date']) ?></td>
                    <td><?= htmlspecialchars($tournament['status']) ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <form method="POST">
            <input type="text" name="name" placeholder="Назва турніру" required>
            <input type="date" name="start_date" required>
            <input type="date" name="end_date" required>
            <select name="status" required>
                <option value="майбутній">Майбутній</option>
                <option value="поточний">Поточний</option>
                <option value="завершений">Завершений</option>
                <option value="live">Live</option>
            </select>
            <input type="submit" name="add_tournament" value="Додати турнір">
        </form>
    </div>

    <div class="container">
        <h2>Команди</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Назва</th>
                    <th>Дата створення</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($teams as $team): ?>
                <tr>
                    <td><?= htmlspecialchars($team['team_id']) ?></td>
                    <td><?= htmlspecialchars($team['name']) ?></td>
                    <td><?= htmlspecialchars($team['created_at']) ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <form method="POST">
            <input type="text" name="name" placeholder="Назва команди" required>
            <input type="submit" name="add_team" value="Додати команду">
        </form>
    </div>

    <div class="container">
        <h2>Матчі</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Турнір ID</th>
                    <th>Команда A ID</th>
                    <th>Команда B ID</th>
                    <th>Час матчу</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($matches as $match): ?>
                <tr>
                    <td><?= htmlspecialchars($match['match_id']) ?></td>
                    <td><?= htmlspecialchars($match['tournament_id']) ?></td>
                    <td><?= htmlspecialchars($match['team_a_id']) ?></td>
                    <td><?= htmlspecialchars($match['team_b_id']) ?></td>
                    <td><?= htmlspecialchars($match['match_time']) ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <form method="POST">
            <input type="number" name="tournament_id" placeholder="ID турніру" required>
            <input type="number" name="team_a_id" placeholder="ID команди A" required>
            <input type="number" name="team_b_id" placeholder="ID команди B" required>
            <input type="datetime-local" name="match_time" required>
            <input type="submit" name="add_match" value="Додати матч">
        </form>
    </div>
</body>
</html>