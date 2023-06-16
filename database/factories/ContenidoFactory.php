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

    public function contentsBio()
    {
        Contenido::create([

            'content'=> 'Composición química de las células',
            'explanation' => 'Estudio de los elementos químicos y compuestos presentes en las células, incluyendo proteínas, lípidos, carbohidratos y ácidos nucleicos.',
            'eje'=> 'Organización estructura y actividad celular',
            'signature_id' => 6

            

        ]);

        Contenido::create([

            'content'=> 'Estructura y función de las organelas celulares',
            'explanation' => 'Análisis de las diferentes estructuras intracelulares, como el núcleo, mitocondrias, retículo endoplasmático y aparato de Golgi, y su papel en las funciones celulares.',
            'eje'=> 'Organización estructura y actividad celular',
            'signature_id' => 6

            

        ]);

        Contenido::create([

            'content'=> 'Membrana celular y transporte de sustancias:',
            'explanation' => 'Exploración de la estructura de la membrana celular, su permeabilidad selectiva y los mecanismos de transporte de sustancias a través de ella.',
            'eje'=> 'Organización estructura y actividad celular',
            'signature_id' => 6

            

        ]);

        Contenido::create([

            'content'=> 'Ciclo celular y control del crecimiento celular',
            'explanation' => ' Estudio de las diferentes etapas del ciclo celular, regulación de la división celular y los factores que afectan el crecimiento y la proliferación celular.',
            'eje'=> 'Organización estructura y actividad celular',
            'signature_id' => 6

            

        ]);

        Contenido::create([

            'content'=> 'Metabolismo celular y producción de energía',
            'explanation' => 'Análisis de los procesos metabólicos básicos en las células, incluyendo la respiración celular, la fotosíntesis y la síntesis de macromoléculas.',
            'eje'=> 'Organización estructura y actividad celular',
            'signature_id' => 6

            

        ]);


        Contenido::create([

            'content'=> 'Homeostasis y regulación de los sistemas',
            'explanation' => 'Exploración de los mecanismos de retroalimentación y control que permiten a los organismos mantener un equilibrio interno estable.',
            'eje'=> 'Procesos y funciones biológicas',
            'signature_id' => 6

            

        ]);

        Contenido::create([

            'content'=> 'Digestión y absorción de nutrientes',
            'explanation' => 'Estudio de los procesos involucrados en la descomposición de los alimentos y la absorción de los nutrientes necesarios para el funcionamiento del organismo.',
            'eje'=> 'Procesos y funciones biológicas',
            'signature_id' => 6

            

        ]);


        Contenido::create([

            'content'=> 'Respiración y transporte de gases',
            'explanation' => 'Análisis de los procesos respiratorios en organismos aeróbicos, incluyendo la ventilación pulmonar y el intercambio de gases en los tejidos.',

            'eje'=> 'Procesos y funciones biológicas',
            'signature_id' => 6

            

        ]);

        Contenido::create([

            'content'=> 'Circulación y sistema cardiovascular',
            'explanation' => 'Exploración de la estructura y función del sistema circulatorio, incluyendo el corazón, los vasos sanguíneos y la distribución de nutrientes y oxígeno.',

            'eje'=> 'Procesos y funciones biológicas',
            'signature_id' => 6

            

        ]);

        Contenido::create([

            'content'=> 'Excreción y sistema urinario',
            'explanation' => 'Estudio del sistema urinario y los procesos de filtración y eliminación de desechos metabólicos y toxinas del organismo.',

            'eje'=> 'Procesos y funciones biológicas',
            'signature_id' => 6

            

        ]);

        Contenido::create([

            'content'=> 'Sistema nervioso y control de la información',
            'explanation' => 'Análisis del sistema nervioso, incluyendo el sistema nervioso central y periférico, y su papel en la recepción, integración y respuesta a estímulos.',

            'eje'=> 'Procesos y funciones biológicas',
            'signature_id' => 6

            

        ]);

        Contenido::create([

            'content'=> 'Sistema endocrino y regulación hormonal',
            'explanation' => 'Exploración de las glándulas endocrinas y las hormonas que producen, así como su papel en la regulación de procesos fisiológicos y el mantenimiento del equilibrio interno.',

            'eje'=> 'Procesos y funciones biológicas',
            'signature_id' => 6

            

        ]);

        Contenido::create([

            'content'=> 'Sistema inmunitario y respuesta inmune',
            'explanation' => 'Estudio del sistema inmunitario y su capacidad para defender al organismo contra agentes patógenos y mantener la integridad frente a enfermedades.',

            'eje'=> 'Procesos y funciones biológicas',
            'signature_id' => 6

            

        ]);

        Contenido::create([

            'content'=> 'Movimiento y sistema musculoesquelético',
            'explanation' => 'Análisis de la estructura y función del sistema musculoesquelético, incluyendo los músculos, huesos, articulaciones y su papel en el movimiento y soporte del cuerpo.',

            'eje'=> 'Procesos y funciones biológicas',
            'signature_id' => 6

            

        ]);


        Contenido::create([
            'content' => 'Reproducción celular: mitosis y meiosis',
            'explanation' => 'Estudio de los procesos de división celular, mitosis y meiosis, y su relación con la herencia y la variabilidad genética.',
            'eje' => 'Herencia y evolución',
            'signature_id' => 6
        ]);

        Contenido::create([
            'content' => 'Conceptos básicos de genética: genes, alelos, genotipo, fenotipo',
            'explanation' => 'Exploración de los fundamentos de la genética, incluyendo la estructura del ADN, los genes, los alelos y cómo se expresan en el fenotipo de los organismos.',
            'eje' => 'Herencia y evolución',
            'signature_id' => 6
        ]);

        Contenido::create([
            'content' => 'Leyes de Mendel y herencia mendeliana',
            'explanation' => 'Análisis de las leyes de Mendel y cómo explican la transmisión de rasgos hereditarios en los organismos.',
            'eje' => 'Herencia y evolución',
            'signature_id' => 6
        ]);
        
        Contenido::create([
            'content' => 'Cruces de Punnett y determinación de probabilidades genéticas',
            'explanation' => 'Estudio de los cruces genéticos y el cálculo de probabilidades para predecir la herencia de rasgos en las generaciones futuras.',
            'eje' => 'Herencia y evolución',
            'signature_id' => 6
        ]);
        
        Contenido::create([
            'content' => 'Mutaciones genéticas y su impacto en la diversidad y evolución',
            'explanation' => 'Exploración de las mutaciones genéticas, cómo ocurren y su importancia en la variabilidad genética y la evolución de las especies.',
            'eje' => 'Herencia y evolución',
            'signature_id' => 6
        ]);
        
        Contenido::create([
            'content' => 'Selección natural y adaptación',
            'explanation' => 'Análisis del proceso de selección natural y cómo influye en la adaptación de los organismos al ambiente.',
            'eje' => 'Herencia y evolución',
            'signature_id' => 6
        ]);
        
        Contenido::create([
            'content' => 'Especiación y formación de nuevas especies',
            'explanation' => 'Estudio de los mecanismos que conducen a la formación de nuevas especies y la diversificación de la vida en la Tierra.',
            'eje' => 'Herencia y evolución',
            'signature_id' => 6
        ]);
        
        Contenido::create([
            'content' => 'Evidencias de la evolución: fósiles, anatomía comparada, biogeografía, genética',
            'explanation' => 'Exploración de las diversas evidencias científicas que respaldan la teoría de la evolución, como los fósiles, la anatomía comparada, la distribución geográfica de los organismos y los estudios genéticos.',
            'eje' => 'Herencia y evolución',
            'signature_id' => 6
        ]);
        
        



        Contenido::create([
            'content' => 'Interacciones entre los seres vivos y su entorno',
            'explanation' => 'Estudio de las relaciones ecológicas entre los organismos y su ambiente, incluyendo la competencia, la depredación, la simbiosis y la sucesión ecológica.',
            'eje' => 'Organismo y ambiente',
            'signature_id' => 6
        ]);
        
        Contenido::create([
            'content' => 'Adaptaciones de los organismos a su ambiente',
            'explanation' => 'Análisis de las adaptaciones morfológicas, fisiológicas y conductuales que permiten a los organismos sobrevivir y reproducirse en su entorno.',
            'eje' => 'Organismo y ambiente',
            'signature_id' => 6
        ]);

        Contenido::create([
            'content' => 'Ecosistemas y ciclos biogeoquímicos',
            'explanation' => 'Exploración de los ecosistemas, incluyendo la estructura y función de los mismos, y los ciclos biogeoquímicos como el ciclo del agua, carbono y nitrógeno.',
            'eje' => 'Organismo y ambiente',
            'signature_id' => 6
        ]);
        
        Contenido::create([
            'content' => 'Dinámica de las poblaciones y factores que la afectan',
            'explanation' => 'Estudio de la dinámica de las poblaciones, incluyendo el crecimiento, la densidad, la distribución y los factores que influyen en ella, como la disponibilidad de recursos y la interacción con otras especies.',
            'eje' => 'Organismo y ambiente',
            'signature_id' => 6
        ]);
        
        Contenido::create([
            'content' => 'Cadenas alimentarias y redes tróficas',
            'explanation' => 'Análisis de las relaciones alimentarias en los ecosistemas, incluyendo las cadenas alimentarias y las interconexiones en las redes tróficas.',
            'eje' => 'Organismo y ambiente',
            'signature_id' => 6
        ]);
        
        Contenido::create([
            'content' => 'Biodiversidad y conservación',
            'explanation' => 'Exploración de la diversidad de organismos en la Tierra y la importancia de la conservación de los ecosistemas y las especies.',
            'eje' => 'Organismo y ambiente',
            'signature_id' => 6
        ]);
        
        Contenido::create([
            'content' => 'Impacto humano en el medio ambiente',
            'explanation' => 'Análisis de las actividades humanas y su impacto en los ecosistemas, incluyendo la deforestación, la contaminación, el cambio climático y la pérdida de hábitats.',
            'eje' => 'Organismo y ambiente',
            'signature_id' => 6
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
