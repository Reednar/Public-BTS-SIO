using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace ConsoleApplication1
{
    class Lion : Felin
    {
        public Lion() { } // constructeur par défaut
        public Lion(int poids, string coul) // constructeur paramètré
        {
            this.Poids = poids;
            this.Couleur = coul;
        }
        // méthode redéfinie obligatoirement car abstraite chez la mère
        public override void crier()
        {
            Console.WriteLine("je rugis");
        }
        // méthode redéfinie obligatoirement car abstraite chez la mère
    }
}
