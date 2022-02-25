using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace ConsoleApplication1
{
    abstract class Felin:Animal
    {
        public override void deplacement()
        {
            Console.WriteLine("Je me déplace en meute");
        }
    }
}
