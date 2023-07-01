<table id="datatable" class="table">



    <thead>
        <tr>
            @foreach ($columns as $col)
                <th>{{ $col }}</th>
            @endforeach
        </tr>
    </thead>

    <tbody>

        @foreach ($dataValue as $row)
            <tr>
                <td data-label="S.No">{{ $row->id }}</td>
                <td data-label="Name">{{ $row->name }}</td>
            </tr>
        @endforeach

    </tbody>
</table>
<div id="pagination">
    <div class="left">
        <select name="pages" id="pages">
            <option value="10">10</option>
            <option value="25">25</option>
            <option value="50">50</option>
            <option value="100">100</option>
        </select>
    </div>
    <div class="right">
        <button id="prev"><<</button>
        <span id="page">Page 1</span>
        <button id="next">>></button>
    </div>
</div>

<style name="pagination">
    #pagination {
        display: flex;
        justify-content: space-between;
    }

    #next,#prev ,#pages {

        font-size: 16px;
        color: #877db3;
        background-color: #f2f2f2;
        border: 0.5px solid #979296;

        cursor: pointer;
    }
</style>



<style>
    .table {
        margin-top: 15px;
        width: 100%;
        border-collapse: collapse;
    }

    .table td,
    .table th {
        padding: 12px 15px;
        border: 1px solid #ddd;
        text-align: center;
        font-size: 16px;
        width:200px;
    }

    .table th {
        background-color: rgb(100, 100, 131);
        color: #ffffff;
    }

    .table tbody tr:nth-child(even) {
        background-color: #f5f5f5;
    }

    /*responsive*/

    @media(max-width: 500px) {
        .table thead {
            display: none;
        }

        .table,
        .table tbody,
        .table tr,
        .table td {
            display: block;
            width: 100%;
        }

        .table tr {
            margin-bottom: 15px;
        }

        .table td {
            text-align: right;
            padding-left: 50%;
            text-align: right;
            position: relative;
        }

        .table td::before {
            content: attr(data-label);
            position: absolute;
            left: 0;
            width: 50%;
            padding-left: 15px;
            font-size: 15px;
            font-weight: bold;
            text-align: left;
        }
    }
</style>

<style>
    #datatable {
        width: 100%;
        border-collapse: collapse;
    }

    #datatable th,
    #datatable td {
        padding: 8px;
        border: 1px solid #ccc;
    }

    #pagination {
        margin-top: 10px;
        text-align: center;
    }

    #pagination button {
        margin: 0 5px;
    }
</style>
<script>
    // Get the necessary elements
    const datatable = document.getElementById('datatable');
    const prevButton = document.getElementById('prev');
    const nextButton = document.getElementById('next');
    const pageLabel = document.getElementById('page');

    // Define the number of items per page
    const itemsPerPage = 5;

    // Calculate the number of pages
    const numRows = datatable.tBodies[0].rows.length;
    const numPages = Math.ceil(numRows / itemsPerPage);

    let currentPage = 1;

    // Function to show the current page
    function showPage(page) {
        // Calculate the start and end index of items to show
        const startIndex = (page - 1) * itemsPerPage;
        const endIndex = startIndex + itemsPerPage;

        // Hide all rows
        const rows = datatable.tBodies[0].rows;
        for (let i = 0; i < rows.length; i++) {
            rows[i].style.display = 'none';
        }

        // Show the rows for the current page
        for (let i = startIndex; i < endIndex && i < rows.length; i++) {
            rows[i].style.display = '';
        }

        // Update the page label
        pageLabel.textContent = `Page ${currentPage} / ${numPages}`;
    }

    // Event listener for previous button
    prevButton.addEventListener('click', () => {
        if (currentPage > 1) {
            currentPage--;
            showPage(currentPage);
        }
    });

    // Event listener for next button
    nextButton.addEventListener('click', () => {
        if (currentPage < numPages) {
            currentPage++;
            showPage(currentPage);
        }
    });

    // Show the initial page
    showPage(currentPage);
</script>
