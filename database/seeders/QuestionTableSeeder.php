<?php

namespace Database\Seeders;

use App\Models\Question;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class QuestionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $question = [
            [ 'title'=>'Question 1/20','body'=>'Votre adresse mail','type'=>'B','possible_answer'=>null,'check_email'=>true,'survey_id'=>1],
            [ 'title'=>'Question 2/20','body'=>'Votre âge','type'=>'B','possible_answer'=>null,'check_email'=>false,'survey_id'=>1],
            [ 'title'=>'Question 3/20','body'=>'Votre sexe','type'=>'A','possible_answer'=>'Homme, Femme, Préfère ne pas répondre','check_email'=>false,'survey_id'=>1],
            [ 'title'=>'Question 4/20','body'=>'Nombre de personne dans votre foyer (adulte & enfants)','type'=>'C','possible_answer'=>'1, 2, 3, 4, 5','check_email'=>false,'survey_id'=>1],
            [ 'title'=>'Question 5/20','body'=>'Votre profession','type'=>'B','possible_answer'=>null,'check_email'=>false,'survey_id'=>1],
            [ 'title'=>'Question 6/20','body'=>'Quel marque de casque VR utilisez-vous ?','type'=>'A','possible_answer'=>'Oculus Quest, Oculus Rift/s, HTC Vive, Windows Mixed
            Reality, Valve index','check_email'=>false,'survey_id'=>1],
            [ 'title'=>'Question 7/20','body'=>'Sur quel magasin d’application achetez vous des contenus VR ?','type'=>'A','possible_answer'=>'SteamVR, Occulus store, Viveport, Windows store','check_email'=>false,'survey_id'=>1],
            [ 'title'=>'Question 8/20','body'=>'Quel casque envisagez-vous d’acheter dans un futur proche  ?','type'=>'A','possible_answer'=>'Occulus Quest, Occulus Go, HTC Vive Pro, PSVR, Autre,
            Aucun','check_email'=>false,'survey_id'=>1],
            [ 'title'=>'Question 9/20','body'=>'Au sein de votre foyer, combien de personnes utilisent votre casque VR pour regarder
            Bigscreen ?','type'=>'C','possible_answer'=>'1, 2, 3, 4, 5','check_email'=>false,'survey_id'=>1],
            [ 'title'=>'Question 10/20','body'=>'Vous utilisez principalement Bigscreen pour','type'=>'A','possible_answer'=>'egarder la TV en direct, regarder des films, travailler,
            jouer en solo, jouer en équipe','check_email'=>false,'survey_id'=>1],
            [ 'title'=>'Question 11/20','body'=>'Combien donnez-vous de point pour la qualité de l’image sur Bigscreen ?','type'=>'C','possible_answer'=>'1, 2, 3, 4, 5','check_email'=>false,'survey_id'=>1],
            [ 'title'=>'Question 12/20','body'=>'Combien donnez-vous de point pour le confort d’utilisation de l’interface Bigscreen ?','type'=>'C','possible_answer'=>'1, 2, 3, 4, 5','check_email'=>false,'survey_id'=>1],
            [ 'title'=>'Question 13/20','body'=>'Combien donnez-vous de point pour la connexion réseau de Bigscreen ?','type'=>'C','possible_answer'=>'1, 2, 3, 4, 5','check_email'=>false,'survey_id'=>1],
            [ 'title'=>'Question 14/20','body'=>'Combien donnez-vous de point pour la qualité des graphismes 3D dans Bigscreen ?','type'=>'C','possible_answer'=>'1, 2, 3, 4, 5','check_email'=>false,'survey_id'=>1],
            [ 'title'=>'Question 15/20','body'=>'Combien donnez-vous de point pour la qualité audio dans Bigscreen ?','type'=>'C','possible_answer'=>'1, 2, 3, 4, 5','check_email'=>false,'survey_id'=>1],
            [ 'title'=>'Question 16/20','body'=>'Aimeriez vous avoir des notifications plus précises au cours de vos sessions Bigscreen ?','type'=>'A','possible_answer'=>'Oui, Non','check_email'=>false,'survey_id'=>1],
            [ 'title'=>'Question 17/20','body'=>'Aimeriez vous pouvoir inviter un ami à rejoindre votre session via son smartphone ?','type'=>'A','possible_answer'=>'Oui, Non','check_email'=>false,'survey_id'=>1],
            [ 'title'=>'Question 18/20','body'=>'Aimeriez vous pouvoir enregistrer des émissions TV pour pouvoir les regarder ultérieurement ?','type'=>'C','possible_answer'=>'1, 2, 3, 4, 5','check_email'=>false,'survey_id'=>1],
            [ 'title'=>'Question 19/20','body'=>'Aimeriez-vous jouer à des jeux exclusifs sur votre Bigscreen ?','type'=>'C','possible_answer'=>'1, 2, 3, 4, 5','check_email'=>false,'survey_id'=>1],
            [ 'title'=>'Question 20/20','body'=>'Quelle nouvelle fonctionnalité devrait exister sur Bigscreen ?','type'=>'B','possible_answer'=>null,'check_email'=>false,'survey_id'=>1],
        ];
        Question::insert($question);
    }
}
