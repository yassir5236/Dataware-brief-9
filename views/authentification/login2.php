<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projet Kanban</title>
    <script src="../assets/js/main.js" defer></script>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
</head>

<body class="bg-gray-100 ">


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



    <!-- Content Section -->
    <div class="container mx-auto mt-8 mb-5 p-4 ">
        <!-- Search Bar and "Ajouter une tâche" button in the same line -->
        <div class="flex justify-between items-center mb-4">
            <button type="button" class="bg-gray-400 text-white px-4 py-2 rounded" onclick="toggleAddTaskForm()">
                Ajouter une tâche
            </button>
            <div class="flex">
                <input type="text" class="border p-2 w-3/4" placeholder="Rechercher des tâches...">
                <button class="bg-gray-400 text-white px-4 py-2 ml-2">Rechercher</button>
            </div>
        </div>



         <!-- Form to add a task -->
         <div id="addTaskForm" class="hidden bg-white p-4 rounded shadow-md md:w-full lg:w-full">
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
                    <button type="submit" class="bg-gray-400 text-white px-4 py-2">Ajouter</button>
                </div>
            </form>
        </div>


        <!-- Form to add a task edit  -->
        <div id="addTaskForm2" class="hidden bg-white p-4 rounded shadow-md md:w-full lg:w-full">
            <h2 class="text-lg font-semibold mb-4">Editer une tâche</h2>
            <form id="taskForm2">
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
                    <button type="submit" class="bg-gray-400 text-white px-4 py-2">Editer</button>
                </div>
            </form>
        </div>



        <!-- Main content -->
        <div id="kanban-board" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 justify-center">
    <!-- Columns for each stage in Kanban (e.g., To Do, In Progress, Done) -->
    <div class="p-4 md:w-full lg:w-full">
    <h2 class="text-lg text-white text-center  rounded-md font-semibold mb-4  border-blue  border-b-2 bg-gradient-to-r from-blue-600 to-green-500">To Do</h2>
    <div class="task-list flex flex-col w-full" id="todo-list">
        <!-- Tasks dynamically added using JavaScript -->
    </div>
</div>
<div class="p-4 md:w-full lg:w-full">
    <h2 class="text-lg text-white text-center  rounded-md font-semibold mb-4  border-blue  border-b-2 bg-gradient-to-r from-blue-600 to-green-500">In Progress</h2>
    <div class="task-list flex flex-col w-full" id="todo-list">
        <!-- Tasks dynamically added using JavaScript -->
    </div>
</div>
<div class="p-4 md:w-full lg:w-full">
    <h2 class="text-lg text-white  text-center  rounded-md font-semibold mb-4  border-blue  border-b-2 bg-gradient-to-r from-blue-600 to-green-500">Done</h2>
    <div class="task-list flex flex-col w-full" id="todo-list">
        <!-- Tasks dynamically added using JavaScript -->
    </div>
</div>



<div class="bg-white p-4 rounded shadow-md md:w-full lg:w-full ">
    <h2 class="text-lg font-semibold mb-4">Task1</h2>
    <div class="task-list flex flex-col w-full" id="todo-list">
        <!-- Tasks dynamically added using JavaScript -->
        <div class="task-item flex justify-between items-center mb-2">
            <span>Task description</span>
            <div class="task-buttons flex">
                <button class="edit-button bg-gray-400 text-white px-2 py-1 mr-2" onclick="toggleAddTaskForm2()">Edit</button>
                <button class="delete-button bg-red-500 text-white px-2 py-1">Delete</button>
            </div>
        </div>
    </div>
</div>

<div class="bg-white p-4 rounded shadow-md md:w-full lg:w-full ">
    <h2 class="text-lg font-semibold mb-4">Task2</h2>
    <div class="task-list flex flex-col w-full" id="inprogress-list">
        <!-- Tasks dynamically added using JavaScript -->
        <div class="task-item flex justify-between items-center mb-2">
            <span>Task description</span>
            <div class="task-buttons2 flex">
                <button class="edit-button bg-gray-400 text-white px-2 py-1 mr-2 " onclick="toggleAddTaskForm2()">Edit</button>
                <button class="delete-button bg-red-500 text-white px-2 py-1">Delete</button>
            </div>
        </div>
    </div>
</div>

<div class="bg-white p-4 rounded shadow-md md:w-full lg:w-full ">
    <h2 class="text-lg font-semibold mb-4">Task3</h2>
    <div class="task-list flex flex-col w-full" id="done-list">
        <!-- Tasks dynamically added using JavaScript -->
        <div class="task-item flex justify-between items-center mb-2">
            <span>Task description</span>
            <div class="task-buttons flex">
                <button class="edit-button bg-gray-400 text-white px-2 py-1 mr-2" onclick="toggleAddTaskForm2()">Edit</button>
                <button class="delete-button bg-red-500 text-white px-2 py-1" >Delete</button>
            </div>
        </div>
    </div>
</div>

</div>










        <!-- Modal for task details -->
        <div class="modal" id="taskModal">
            <!-- Content dynamically added using JavaScript -->
        </div>

        <!-- Add Task Button -->

    </div>

    <!-- JavaScript dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- Your custom JavaScript file -->
    <script src="app.js"></script>
  
</body>

</html>