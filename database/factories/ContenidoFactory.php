<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Contenido;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Contenido>
 */
class ContenidoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    public function definition(){

    } 

    public function contentHist()
    {
        Contenido::create([
            'content' => $this->faker->paragraph(),
            'eje'=>$this->faker->word(),
            'explanation'=>$this->faker->text(),
            'signature_id'=>1
        ]);

    }

    public function contentIng()
    {
        Contenido::create([
            'content' => $this->faker->paragraph(),
            'eje'=>$this->faker->word(),
            'explanation'=>$this->faker->text(),
            'signature_id'=>3
        ]);

    }

    public function contentQuim()
    {
        Contenido::create([
            'content' => $this->faker->paragraph(),
            'eje'=>$this->faker->word(),
            'explanation'=>$this->faker->text(),
            'signature_id'=>4
        ]);

    }

    public function contentFis()
    {
        Contenido::create([
            'content' => $this->faker->paragraph(),
            'eje'=>$this->faker->word(),
            'explanation'=>$this->faker->text(),
            'signature_id'=>5
        ]);

    }

    public function contentBio()
    {
        Contenido::create([
            'content' => $this->faker->paragraph(),
            'eje'=>$this->faker->word(),
            'explanation'=>$this->faker->text(),
            'signature_id'=>6
        ]);

    }


    public function contentsMat()
    {
        Contenido::create([

            'content'=>'Números naturales',
            'eje'=> 'Aritmética',
            'explanation' => 'Propiedades y operaciones básicas (suma, resta, multiplicación, división, potenciación y radicación) con números naturales.' ,
            'signature_id' => 2

        ]);

        Contenido::create([

            'content'=> 'Números enteros',
            'eje'=> 'Aritmética',
            'explanation' => 'Propiedades y operaciones básicas con números enteros, comparación y ordenamiento de números enteros.',
            'signature_id' => 2

        ]);

        Contenido::create([

            'content'=> 'Números racionales',
            'explanation' => 'Propiedades y operaciones básicas con números racionales (suma, resta, multiplicación, división, potenciación y radicación), simplificación de fracciones, comparación y ordenamiento de números racionales.',
            'eje'=> 'Aritmética',
            'signature_id' => 2

        ]);

        Contenido::create([

            'content'=> 'Números irracionales',
            'explanation' => 'Propiedades básicas de los números irracionales y su relación con los números racionales.',
            'eje'=> 'Aritmética',
            'signature_id' => 2

        ]);

        Contenido::create([

            'content'=> 'Números reales',
            'explanation' => 'Propiedades y ordenamiento de los números reales, representación en la recta real, valor absoluto.',
            'eje'=> 'Aritmética',
            'signature_id' => 2

        ]);

        Contenido::create([

            'content'=> 'Divisibilidad y factorización',
            'explanation' => 'Múltiplos, divisores, criterios de divisibilidad, descomposición en factores primos, máximo común divisor, mínimo común múltiplo.',
            'eje'=> 'Aritmética',
            'signature_id' => 2

        ]);

        Contenido::create([

            'content'=> 'Fracciones y números decimales',
            'explanation' => 'Propiedades y operaciones básicas con fracciones y números decimales, representación en la recta real, comparación y ordenamiento de fracciones y números decimales.',
            'eje'=> 'Aritmética',
            'signature_id' => 2

        ]);

        Contenido::create([

            'content'=> 'Porcentajes',
            'explanation' => 'Concepto de porcentaje, cálculo de porcentajes, aumentos y disminuciones porcentuales, aplicaciones en la vida cotidiana.',
            'eje'=> 'Aritmética',
            'signature_id' => 2

        ]);

        Contenido::create([

            'content'=> 'Proporciones y razones',
            'explanation' => 'Proporciones y razones, propiedades y aplicaciones en la resolución de problemas.',
            'eje'=> 'Aritmética',
            'signature_id' => 2

        ]);


        Contenido::create([

            'content'=> 'Expresiones algebraicas',
            'explanation' => 'Variables, coeficientes, términos, monomios, polinomios y operaciones básicas con ellos (suma, resta, multiplicación, división, potenciación y radicación).',
            'eje'=> 'Álgebra' ,
            'signature_id' => 2

        ]);

        Contenido::create([

            'content'=> 'Ecuaciones lineales',
            'explanation' => 'Ecuaciones lineales de primer grado con una variable, resolución de ecuaciones, identidades y ecuaciones inconsistentes.',

            'eje'=> 'Álgebra' ,
            'signature_id' => 2

        ]);

        Contenido::create([

            'content'=> 'Sistemas de ecuaciones lineales',
            'explanation' => 'Sistemas de ecuaciones lineales con dos o más variables, resolución por métodos gráficos y algebraicos.',

            'eje'=> 'Álgebra' ,
            'signature_id' => 2

        ]);

        Contenido::create([

            'content'=> 'Inecuaciones lineales',
            'explanation' => 'Inecuaciones lineales de primer grado con una variable, resolución de inecuaciones, representación gráfica.',
            'eje'=> 'Álgebra' ,
            'signature_id' => 2

        ]);

        Contenido::create([

            'content'=> 'Funciones',
            'explanation' => 'Concepto de función, gráficas de funciones, dominio, rango, simetría y periodicidad, funciones lineales y cuadráticas, transformaciones de funciones.',
            'eje'=> 'Álgebra' ,
            'signature_id' => 2

        ]);

        Contenido::create([

            'content'=> 'Ecuaciones y sistemas de ecuaciones cuadráticas',
            'explanation' => 'Ecuaciones y sistemas de ecuaciones cuadráticas, resolución por factorización, fórmula general y completación de cuadrados, discriminante.',
            'eje'=> 'Álgebra' ,
            'signature_id' => 2

        ]);

        Contenido::create([

            'content'=> 'Funciones exponenciales y logarítmicas',
            'explanation' => 'Funciones exponenciales y logarítmicas, propiedades y aplicaciones en la resolución de problemas.',
            'eje'=> 'Álgebra' ,
            'signature_id' => 2

        ]);

        Contenido::create([

            'content'=> 'Secuencias y series',
            'explanation' => 'Secuencias aritméticas y geométricas, sumas de términos, aplicaciones en la resolución de problemas.',
            'eje'=> 'Álgebra',
            'signature_id' => 2

        ]);



        Contenido::create([

            'content'=> 'Ecuaciones e inecuaciones con valor absoluto',
            'explanation' => 'Ecuaciones e inecuaciones con valor absoluto, resolución y representación gráfica.',
            'eje'=> 'Álgebra',
            'signature_id' => 2

        ]);

        Contenido::create([

            'content'=> 'Conceptos básicos de geometría plana',
            'explanation' => 'Puntos, rectas, segmentos, ángulos, congruencia y semejanza de figuras.',
            'eje'=> 'Geometría',
            'signature_id' => 2

        ]);

        Contenido::create([

            'content'=> 'Polígonos',
            'explanation' => 'Clasificación y propiedades, perímetro y área de polígonos regulares e irregulares.',
            'eje'=> 'Geometría',
            'signature_id' => 2

        ]);

        Contenido::create([

            'content'=> 'Triángulos',
            'explanation' => 'Clasificación según sus lados y ángulos, congruencia y semejanza de triángulos, teorema de Pitágoras, perímetro y área de triángulos.',
            'eje'=> 'Geometría',
            'signature_id' => 2

        ]);

        Contenido::create([

            'content'=> 'Cuadriláteros',
            'explanation' => 'Clasificación y propiedades, teorema de los cuatro ángulos, perímetro y área de cuadriláteros.',
            'eje'=> 'Geometría',
            'signature_id' => 2

        ]);

        Contenido::create([

            'content'=> 'Circunferencia y círculo',
            'explanation' => 'Definición y propiedades, elementos de la circunferencia, ángulos y segmentos en la circunferencia, área y longitud de la circunferencia.',
            'eje'=> 'Geometría',
            'signature_id' => 2

        ]);

        Contenido::create([

            'content'=> 'Ángulos y segmentos en la circunferencia',
            'explanation' => 'Ángulos inscritos, ángulos centrales, ángulos en posición de tangencia, segmentos tangentes, secantes y cuerda, propiedades.',
            'eje'=> 'Geometría',
            'signature_id' => 2

        ]);

        Contenido::create([

            'content'=> 'Polígonos inscritos y circunscritos',
            'explanation' => 'Propiedades de los polígonos inscritos y circunscritos en una circunferencia.',
            'eje'=> 'Geometría',
            'signature_id' => 2

        ]);

        Contenido::create([

            'content'=> 'Geometría en el espacio',
            'explanation' => 'Puntos, rectas y planos en el espacio, ángulos diedros y poliedros, clasificación y propiedades.',
            'eje'=> 'Geometría',
            'signature_id' => 2

        ]);

        Contenido::create([

            'content'=> 'Prismas, pirámides y cilindros',
            'explanation' => 'Propiedades, área y volumen de prismas, pirámides y cilindros.',
            'eje'=> 'Geometría',
            'signature_id' => 2

        ]);

        Contenido::create([

            'content'=> 'Esfera',
            'explanation' => 'Definición y propiedades, elementos de la esfera, área y volumen de la esfera.',
            'eje'=> 'Geometría',
            'signature_id' => 2

        ]);

        Contenido::create([

            'content'=> 'Trigonometría plana',
            'explanation' => 'Razones trigonométricas (seno, coseno y tangente), identidades trigonométricas, resolución de triángulos rectángulos.',
            'eje'=> 'Geometría',
            'signature_id' => 2

        ]);

        Contenido::create([

            'content'=> 'Conceptos básicos de estadística',
            'explanation' => 'Variables estadísticas, tipos de variables, distribución de frecuencias, medidas de tendencia central (media, mediana y moda), medidas de dispersión (rango, varianza y desviación estándar).',
            'eje'=> 'Probabilidad, estadística y análisis de datos',
            'signature_id' => 2

        ]);

        Contenido::create([

            'content'=> 'Análisis exploratorio de datos',
            'explanation' => 'Gráficos estadísticos (histogramas, gráficos de barras, gráficos de dispersión, entre otros), diagramas de caja y bigotes, análisis de correlación.',
            'eje'=> 'Probabilidad, estadística y análisis de datos',
            'signature_id' => 2

        ]);

        Contenido::create([

            'content'=> 'Inferencia estadística',
            'explanation' => 'Estimación de parámetros poblacionales, pruebas de hipótesis, intervalos de confianza, significación estadística, errores tipo I y tipo II.',
            'eje'=> 'Probabilidad, estadística y análisis de datos',
            'signature_id' => 2

        ]);

        Contenido::create([

            'content'=> 'Probabilidad',
            'explanation' => 'Conceptos básicos, eventos y sucesos, cálculo de probabilidades, eventos complementarios y contrarios, regla de la multiplicación y la adición, probabilidad condicional e independencia.',
            'eje'=> 'Probabilidad, estadística y análisis de datos',
            'signature_id' => 2

        ]);

        Contenido::create([

            'content'=> 'Distribuciones de probabilidad',
            'explanation' => 'Distribución binomial, distribución normal, distribución de Poisson, entre otras.',
            'eje'=> 'Probabilidad, estadística y análisis de datos',
            'signature_id' => 2

        ]);

        Contenido::create([

            'content'=> 'Análisis de regresión',
            'explanation' => 'Modelo de regresión lineal simple y múltiple, interpretación de los coeficientes, supuestos del modelo, análisis de la varianza.',
            'eje'=> 'Probabilidad, estadística y análisis de datos',
            'signature_id' => 2

        ]);

        Contenido::create([

            'content'=> 'Análisis combinatorio',
            'explanation' => 'Principio fundamental de la multiplicación, principio fundamental de la suma, permutaciones, combinaciones, variaciones y aplicaciones.',
            'eje'=> 'Probabilidad, estadística y análisis de datos',
            'signature_id' => 2

        ]);


/*        Contenido::create([

            'content'=> ,
            'explanation' => ,

            'eje'=> ,
            'signature_id' =>

            

        ]);

            Contenido::create([

            'content'=> ,
            'explanation' => ,

            'eje'=> 'Aritmética',
            'signature_id' => 2

        ]);

        Contenido::create([

            'content'=> ,
            'explanation' => ,

            'eje'=> 'Álgebra' ,
            'signature_id' => 2

        ]);

        Contenido::create([

            'content'=> ,
            'explanation' => ,

            'eje'=> 'Geometría',
            'signature_id' => 2

        ]);

        Contenido::create([

            'content'=> ,
            'explanation' => ,

            'eje'=> 'Probabilidad, estadística y análisis de datos',
            'signature_id' => 2

        ]);

        Contenido::create([

            'content'=> ,
            'explanation' => ,

            'eje'=> 'Cálculo',
            'signature_id' => 2

        ]);

*/

    }

    
}
