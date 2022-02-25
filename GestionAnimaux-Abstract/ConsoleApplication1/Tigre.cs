using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace ConsoleApplication1
{
    class Tigre : Felin
    {
        public Tigre() { } // constructeur par défaut
        public Tigre(int poids, string coul) // constructeur paramètré
        {
            this.Poids = poids;
            this.Couleur = coul;
        }
        // méthode redéfinie obligatoirement car abstraite chez la mère
        public override void crier()
        {
            Console.WriteLine("je rugis comme le lion");
        }
        // méthode redéfinie obligatoirement car abstraite chez la mère

    }
}
