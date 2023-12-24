<?php
use App\Controllers\FootballTeamController;
include(__DIR__."/../layout/head.php");
?>


<body>


    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <caption
                class="p-5 text-lg font-semibold text-left rtl:text-right text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                CAF Nations Cup
                <p class="mt-1 text-sm font-normal text-gray-500 dark:text-gray-400">Browse a list of Flowbite products
                    designed to help you work and play, stay organized, get answers, keep in touch, grow your business,
                    and more.</p>
            </caption>
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        id
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Name
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Players
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Coach
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <span class="sr-only">Action</span>
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($teams as $team): ?>
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            <?php echo $team['id']; ?>
                        </th>
                        <td class="px-6 py-4">
                            <?php echo $team['name']; ?>
                        </td>
                        <td class="px-6 py-4">
                            <?php echo $team['players']; ?>
                        </td>
                        <td class="px-6 py-4">
                            <?php echo $team['coach']; ?>
                        </td>
                        <td class="px-6 py-4 text-right">
                            <a href="/football_teams/<?php echo $team['id']; ?>/edit" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                            <a href="/football_teams/<?php echo $team['id']; ?>/delete" class="font-medium text-red-600 dark:text-red-500 hover:underline">Delte</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <?php include(__DIR__."/../layout/footer.php") ?>
</body>

</html>