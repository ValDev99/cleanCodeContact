<form method="post" action="">
    <label for="username">Nom :</label>
    <input type="text" id="username" name="username" required>
    <label for="phonenumber">Téléphone :</label>
    <input type="text" id="phonenumber" name="phonenumber" required>
    <button type="submit">Ajouter</button>
</form>

<h2>Liste des Contacts</h2>
<table>
    <thead>
        <tr>
            <th>Nom</th>
            <th>Téléphone</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php if (count($contacts) > 0): ?>
            <?php foreach ($contacts as $contact): ?>
                <tr>
                    <td><?= htmlspecialchars($contact['username']) ?></td>
                    <td><?= htmlspecialchars($contact['phonenumber']) ?></td>
                    <td>
                        <a href="?delete=<?= $contact['id'] ?>" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce contact ?');">Supprimer</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="3">Aucun contact trouvé.</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>
