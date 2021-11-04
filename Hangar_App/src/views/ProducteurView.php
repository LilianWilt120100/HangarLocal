<?php


namespace App\views;


class ProducteurView
{
    private $data;

    public function __construct(array $data){
        $this->data =$data;
    }

    public function render(array $vars){

        if(isset($this->data['errorMessage'])) {
            $errMessage = <<<END
<p class="errMessage" style="color: red;">
{$this->data['errorMessage']}
</p>
END;
        }
        else $errMessage = '';

        switch ($vars['renderfunc']) {
            
            
            case 'inscription':

                $html = <<<END
                <!DOCTYPE html>
<html lang="fr" dir="ltr">
<head>
    <meta charset="utf-8">
    <title>Welcome</title>
    
</head>
<body>

<div>
      <h1>Bienvenue {$this->data['nom']} !</h1>
</div>
</body>

</html>
END;


                break;
        }

        return $html;
    }
}