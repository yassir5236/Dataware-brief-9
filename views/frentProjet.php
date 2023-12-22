<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="../assets/js/main.js" defer></script>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <title>Projet Kanban</title>
</head>
<body class="bg-gray-100">
    

<header class="sticky top-0 w-full  z-30 bg-gray-600 p-4 flex justify-between items-center">
    <div class="text-xl font-bold w-32 mt-1">
    <!-- <img src="http://localhost/DataWare-Brief7/Membre/image/logov.PNG" class="w-full h-auto" alt="Logo"> -->
    </div>

    <div class="flex items-center">

        <button id="burgerBtn" class="sm:hidden focus:outline-none">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                class="w-6 h-6 text-white">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
            </svg>
        </button>

        <nav class="space-x-4 hidden sm:flex items-center">
            <a href="./project.php" class="text-white hover:text-gray-300 transition duration-300">Dashboard</a>
            <a href="./community.php"  class="text-white hover:text-gray-300 transition duration-300">Community</a>
            <button id="logoutBtn" class="text-white px-7 py-2 rounded-full border border-white">
                <a href="../../../logout.php" class="text-white">Log Out</a>
            </button>
        </nav>
    </div>
    </header>

<!-- Navbar Responsive -->
<div id="burgerOverlay"
    class="fixed py-5 top-18 right-0 w-1/2 h-screen bg-gray-600 bg-opacity-50 z-50 hidden items-center justify-center sm:hidden">
    <nav class="flex flex-col items-center space-y-5">
        <a href="./project.php" class="text-white hover:text-gray-300 transition duration-300">Dashboard</a>
        <a href="./community.php" class="text-white hover:text-gray-300 transition duration-300">Community</a>
        <a href="../../../logout.php"  class="text-white hover:text-gray-300 transition duration-300">Log out</a>
    </nav>
</div>





    <div class="container mx-auto my-8 p-8 bg-white shadow-md rounded-md">
    <h1 class="text-3xl font-semibold mb-4 text-center">Mes Projets</h1>


    
    <div id="addTaskForm3" class="hidden bg-white p-4 rounded shadow-md md:w-full lg:w-full">
            <h2 class="text-lg font-semibold mb-4">Ajouter une tâche</h2>
            <form id="taskForm">
                <div class="mb-4">
                    <label for="taskTitle" class="block text-sm font-medium text-gray-600">Titre de la tâche</label>
                    <input type="text" id="taskTitle" name="taskTitle" class="border p-2 w-full" required>
                </div>
                <!-- Ajoutez d'autres champs d'entrée ici, par exemple : -->
                <div class="mb-4">
                    <label for="taskDescription" class="block text-sm font-medium text-gray-600">Description de la tâche</label>
                    <input type="text" id="taskDescription" name="taskDescription" class="border p-2 w-full" required>
                </div>

                <div class="mb-4">
                    <label for="taskDescription" class="block text-sm font-medium text-gray-600">Deadline</label>
                    <input type="text" id="taskDescription" name="taskDescription" class="border p-2 w-full" required>
                </div>

                <div class="mb-4">
                    <label for="taskDescription" class="block text-sm font-medium text-gray-600">Statut</label>
                    <input type="text" id="taskDescription" name="taskDescription" class="border p-2 w-full" required>
                </div>

                <!-- Ajoutez d'autres champs d'entrée selon vos besoins -->

                <div class="flex justify-end">
                    <button type="submit" class="bg-gray-400 text-white px-4 py-2" >Ajouter</button>
                </div>
            </form>
        </div>

        <button>
        <div class="grid md:grid-cols-2 lg:grid-cols-3 xl:flex xl:flex-wrap gap-4 justify-center">
            <!-- Ajoutez des cartes de projet ici -->
            <div class="flex-1 bg-gray-200 p-6 rounded-md mb-4">
                <h2 class="text-xl font-semibold mb-2">Projet 1</h2>
                <p class="text-gray-700">Description du projet 1. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                <!-- Ajoutez des tâches ici -->
            </div>

            <!-- Ajoutez d'autres cartes de projet ici -->

        </div>
        
        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-2 mb-8" onclick="toggleAddTaskForm3()">Editer projet</button>
        <button class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded mb-8 ">Supprimer projet</button>


        </button>


        <button>
        <div class="grid md:grid-cols-2 lg:grid-cols-3 xl:flex xl:flex-wrap gap-4 justify-center mb-4">
            <!-- Ajoutez des cartes de projet ici -->
            <div class="flex-1 bg-gray-200 p-6 rounded-md ">
                <h2 class="text-xl font-semibold mb-2">Projet 1</h2>
                <p class="text-gray-700">Description du projet 1. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                <!-- Ajoutez des tâches ici -->
            </div>

            <!-- Ajoutez d'autres cartes de projet ici -->

        </div>
        
        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-2 " onclick="toggleAddTaskForm3()" >Editer projet</button>
        <button class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded  ">Supprimer projet</button>
        </button>
        <!-- Répétez la structure pour d'autres projets -->
    </div>

    <!-- Form to add a task -->
  

    <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.min.js" defer></script>
</body>
</html>
