<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD avec PHP et AJAX</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 p-8">
    <div class="max-w-2xl mx-auto bg-white p-6 rounded-lg shadow-lg">
        <h1 class="text-3xl font-bold text-center mb-6 text-gray-800">Gestion des éléments</h1>

        <!-- Formulaire d'ajout -->
        <form id="addForm" class="mb-6">
            <div class="flex gap-4">
                <input type="text" name="name" id="name" placeholder="Nom de l'élément" required
                       class="flex-1 p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                <button type="submit"
                        class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 transition duration-200">
                    Ajouter
                </button>
            </div>
        </form>

        <div id="items" class="space-y-4">
           
        </div>
    </div>

    <script>
        // Charger les éléments
        function loadItems() {
            $.ajax({
                url: '../controllers/ItemController.php?action=read',
                method: 'GET',
                success: function (response) {
                    if (response.success) {
                        let html = '';
                        response.data.forEach(item => {
                            html += `
                                <div class="flex justify-between items-center bg-gray-50 p-4 rounded-lg shadow-sm">
                                    <span class="text-gray-700">${item.name}</span>
                                    <div>
                                        <button class="editBtn bg-yellow-500 text-white px-3 py-1 rounded-lg hover:bg-yellow-600 transition duration-200" onclick="editItem(${item.id}, '${item.name}')">
                                            Éditer
                                        </button>
                                        <button class="deleteBtn bg-red-500 text-white px-3 py-1 rounded-lg hover:bg-red-600 transition duration-200" data-id='${item.id}'>
                                            Supprimer
                                        </button>
                                    </div>
                                </div>`;
                        });
                        $('#items').html(html);
                    } else {
                        console.error("Erreur lors du chargement des éléments : ", response.message);
                    }
                },
                error: function (xhr, status, error) {
                    console.error("Erreur lors du chargement des éléments : ", error);
                }
            });
        }
        function editItem(id, name) {
            const newName = prompt('Modifier le nom de l\'élément:', name);
            if (newName) {
                $.ajax({
                    url: '../controllers/ItemController.php?action=update',
                    method: 'POST',
                    data: { id: id, name: newName },
                    success: function (response) {
                        if (response.success) {
                            loadItems(); 
                        } else {
                            console.error("Erreur lors de la mise à jour de l'élément : ", response.message);
                        }
                    },
                    error: function (xhr, status, error) {
                        console.error("Erreur lors de la mise à jour de l'élément : ", error);
                    }
                });
            }
        }
          // Ajouter un élément
          $('#addForm').submit(function (e) {
            e.preventDefault();
            $.ajax({
                url: '../controllers/ItemController.php?action=create',
                method: 'POST',
                data: $(this).serialize(),
                success: function (response) {
                    if (response.success) {
                        loadItems();
                        $('#name').val('');
                    } else {
                        console.error("Erreur lors de l'ajout de l'élément : ", response.message);
                    }
                },
                error: function (xhr, status, error) {
                    console.error("Erreur lors de l'ajout de l'élément : ", error);
                }
            });
        });

        // Supprimer un élément
        $(document).on('click', '.deleteBtn', function () {
            const id = $(this).data('id');
            $.ajax({
                url: '../controllers/ItemController.php?action=delete',
                method: 'POST',
                data: { id: id },
                success: function (response) {
                    alert('Élément supprimé avec succès');
                    loadItems();
                }
            });
        });
        loadItems();
    </script>
</body>
</html>