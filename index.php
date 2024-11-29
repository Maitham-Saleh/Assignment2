<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unpkg.com/@picocss/pico@1.*/css/pico.min.css">
    <title>Styled Data Table</title>
    
</head>
<body>
    <header>
        
    </header>
    <main>
        <table>
            <thead>
                <tr>
                    <th>Year</th>
                    <th>Semester</th>
                    <th>The Programs</th>
                    <th>Nationality</th>
                    <th>Colleges</th>
                    <th>Number of Students</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Fetch the JSON data from the API URL
                $url = "https://data.gov.bh/api/explore/v2.1/catalog/datasets/01-statistics-of-students-nationalities_updated/records?where=colleges%20like%20%22IT%22%20AND%20the_programs%20like%20%22bachelor%22&limit=100";
                $data = file_get_contents($url);

                // Decode the JSON data to a PHP array
                $products = json_decode($data, true);

                // Check if the 'results' key exists and is not empty
                if (!empty($products['results'])) {
                    // Loop through the 'results' array
                    foreach ($products['results'] as $item) {
                        echo "<tr>";
                        echo "<td>" . htmlspecialchars($item['year'] ?? 'N/A') . "</td>";
                        echo "<td>" . htmlspecialchars($item['semester'] ?? 'N/A') . "</td>";
                        echo "<td>" . htmlspecialchars($item['the_programs'] ?? 'N/A') . "</td>";
                        echo "<td>" . htmlspecialchars($item['nationality'] ?? 'N/A') . "</td>";
                        echo "<td>" . htmlspecialchars($item['colleges'] ?? 'N/A') . "</td>";
                        echo "<td>" . htmlspecialchars($item['number_of_students'] ?? 'N/A') . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='6'>No data available</td></tr>";
                }
                ?>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="6">End of data</td>
                </tr>
            </tfoot>
        </table>
    </main>
    <footer>
        <p>Powered by Bahrain Open Data API</p>
    </footer>
</body>
</html>