<p>1.) Erstelle eine Klasse in der es zwei Eigenschaften gibt.
Erzeuge zwei Objekte aus dieser Klasse und verändere für jedes Objekt den Wert der Eigenschaften
</p>
<?php
	class Test { public $one; public $two; }
	$one = new Test();
	$one->one = "Hallo";
	$one->two = 'Welt';

	$two = new Test();
	$two->one = "Huhu";
	$two->two = 'Haha';
?>
<p>
2.) Erstelle eine Klasse in der ihr ein Array mit Seitentiteln habt
Schreibe eine Methode um die Seitentitel aus dem Array zu holen.
Rufe die Methode in deinem Title Attribut mit dem Page-Parameter auf
z.B. : ['home' => 'Das ist die Startseite']
</p>
<?php
	class Title {
		public $titles = ['home' => 'Das ist die Startseite'];

		public function getTitle($title)
		{
			return $this->titles[$title] ?? '';
		}
	}
	$newTitle = new Title();
	$newTitle->getTitle($_GET['p'] ?? 'home');

?>
<p>
3.) Erstelle in einer Klasse einen Konstruktor und lasse ihn bei Ausführung "Hallo Welt" ausgeben
a) Übergebe bei der Instanziierung einen eigenen String der ausgegeben werden soll.
</p>
<?php
	class Test2 {
		public function __construct($param)
		{
			echo "Hallo Welt!";
			echo $param;
		}
	}

	$new = new Test2('myCustomValue');
?>

4.) Erstelle eine Klasse die Euch folgende HTML Elemente als Methoden zur Verfügung stellt.
(Schwierigkeit steigert sich)
getHeadline($content)
getParagraph($content)
getUnorderedList(Array $listEntries = [])
getTable(Array $ColNames = [], Array $rowContent = [])

<?php
	class generateHTML {

		public function writeHeadline($content, $level)
		{
			return '<' . $level . '>' . $content . '</' . $level . '>';
		}

		public function writeParagraph($content)
		{
			return '<p>' . $content . '</p>';
		}

		public function writeUl(Array $entries = [])
		{
			$output = '<ul>';
			foreach ($entries as $entry){
				$output .= '<li>' . $entry . '</li>';
			}
			$output .= '</ul>';

			return $output;
		}

		public function writeTable(Array $header = [], Array $content = [])
		{
			$out = '<table>';
				$out .= '<thead>
							<tr>';
					foreach ($header as $headline){
						$out .= '<th>' . $headline . '</th>';
					}
				$out .=     '</tr>
						</thead>';
				$out .= '<tbody>';
					foreach ($content as $index => $value){
						$out .= '<tr>';
							foreach ($value as $inner){
								$out .= '<td>' . $inner . '</td>';
								//$out .= "<td>{$inner}</td>";
							}
						$out .= '</tr>';
					}
				$out .= '</tbody>';
			$out .= '</table>';

			return $out;
		}



	}

	$html = new generateHTML();

?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
	      content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Document</title>
</head>
<body>
	<?= $html->writeUl(['first', 'scnd', 'third']) ?>
	<h1>Table</h1>
	<?= $html->writeTable(['Name', 'Lastname', 'City'], [
		0 => [
				'Marten',
				'Stockenberg',
				'Leipzig'
		],
		1 => [
				'Norman',
				'Schmidtgal',
				'Leipzig'
		]
	]); ?>

</body>
</html>



