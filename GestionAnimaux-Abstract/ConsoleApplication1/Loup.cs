using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace ConsoleApplication1
{
    class Loup : Animal
    {
        public Loup(){} // constructeur par défaut
        public Loup(int poids, string coul) // constructeur paramètré
        {
            this.Poids = poids;
            this.Couleur = coul;
        }
        // méthode redéfinie obligatoirement car abstraite chez la mère
        public override void crier()
        {
            Console.WriteLine("je hurle");
        }
        // méthode redéfinie obligatoirement car abstraite chez la mère
        public override void deplacement()
        {
            Console.WriteLine("je me déplace en meute");
        }
    }
}
